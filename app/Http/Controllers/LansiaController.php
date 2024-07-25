<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use Illuminate\Http\Request;
use Gate;
use File;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use GuzzleHttp\Client;
use Telegram\Bot\Api;

class LansiaController extends Controller
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
        abort_if(Gate::denies('lansia_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lansia = Lansia::orderBy('id', 'asc')->get();
        return view('pages.lansia.index', compact('lansia'));
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

            // Simpan ke folder file-lansia
            $destinationPathLansia = 'public/assets/file-lansia';
            $pathLansia = $request->file('foto')->storeAs($destinationPathLansia, $fullFileName);

            // Simpan ke folder file-user
            $destinationPathUser = 'public/assets/file-user';
            $pathUser = $request->file('foto')->storeAs($destinationPathUser, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // Buat array data untuk tabel 'lansia'
        $lansiaData = [
            'nama' => $data['nama'],
            'nik' => $data['nik'],
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
        $lansia = Lansia::create($lansiaData);
        $userData['lansia_id'] = $lansia->id;
        $user = User::create($userData);

        $user->role()->sync([3]);

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menambahkan Data Lansia Baru');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('lansia.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lansia $lansia)
    {
        abort_if(Gate::denies('lansia_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // return($lansia);
        return view('pages.lansia.show', compact('lansia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lansia $lansia)
    {
        abort_if(Gate::denies('lansia_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.lansia.edit', compact('lansia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lansia $lansia)
    {
        // get all request from frontsite
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-lansia';
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs($destinationPath, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // update to database
        $lansia->update($data);

        alert()->success('Berhasil', 'Berhasil Memperbarui Data Lansia');
        return redirect()->route('lansia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lansia $lansia)
    {
        abort_if(Gate::denies('lansia_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $lansia['foto'];

        $data = 'storage/' . $get_item;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/' . $get_item);
        }

        // Hapus user yang memiliki lansia_id sesuai dengan $lansia->id
        $user = User::where('lansia_id', $lansia->id)->first();
        if ($user) {
            $user->delete();
        }

        $lansia->delete();

        alert()->success('Berhasil', 'Berhasil Menghapus Data Lansia');
        return back();
    }

}
