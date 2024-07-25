<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Gate;
use File;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('petugas_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petugas = Petugas::orderBy('id', 'asc')->get();
        return view('pages.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();

            // Simpan ke folder file-petugas
            $destinationPathPetugas = 'public/assets/file-petugas';
            $pathPetugas = $request->file('foto')->storeAs($destinationPathPetugas, $fullFileName);

            // Simpan ke folder file-user
            $destinationPathUser = 'public/assets/file-user';
            $pathUser = $request->file('foto')->storeAs($destinationPathUser, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // Buat array data untuk tabel 'petugas'
        $petugasData = [
            'nama' => $data['nama'],
            'nip' => $data['nip'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'no_hp' => $data['no_hp'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'foto' => $data['foto'] ?? null,
        ];

        // Buat array data untuk tabel 'users'
        $userData = [
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['email']),
            'foto' => $data['foto'] ?? null,
        ];

        // Kirim data ke database
        $petugas = Petugas::create($petugasData);
        $userData['petugas_id'] = $petugas->id;
        $user = User::create($userData);

        $user->role()->sync([2]);

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menambahkan Data Petugas Baru');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('petugas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        abort_if(Gate::denies('petugas_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // return($petugas);
        return view('pages.petugas.show', compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        abort_if(Gate::denies('petugas_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petugas)
    {
        // get all request from frontsite
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-petugas';
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs($destinationPath, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // update to database
        $petugas->update($data);

        alert()->success('Berhasil', 'Berhasil Memperbarui Data Petugas');
        return redirect()->route('petugas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        abort_if(Gate::denies('petugas_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $petugas['foto'];

        $data = 'storage/' . $get_item;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/' . $get_item);
        }

        // Hapus user yang memiliki petugas_id sesuai dengan $petugas->id
        $user = User::where('petugas_id', $petugas->id)->first();
        if ($user) {
            $user->delete();
        }

        $petugas->delete();

        alert()->success('Berhasil', 'Berhasil Menghapus Data Petugas');
        return back();
    }
}
