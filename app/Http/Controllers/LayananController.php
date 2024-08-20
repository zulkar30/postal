<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use App\Models\Layanan;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use PDF;

class LayananController extends Controller
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
    public function index(Request $request)
    {
        // Middleware Gate
        abort_if(Gate::denies('layanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loggedInUser = Auth::user();
        $bulan = $request->get('bulan');
        $lansiaId = $request->get('lansia_id');

        // Query dasar untuk mengambil data layanan
        $query = Layanan::query();

        // Filter berdasarkan bulan jika ada
        if ($bulan) {
            $query->whereMonth('created_at', $bulan);
        }

        // Filter berdasarkan petugas_id (untuk dokter/kader yang sedang login)
        if ($loggedInUser->petugas_id) {
            $query->where('petugas_id', $loggedInUser->petugas_id);
        }

        // Filter berdasarkan lansia_id (untuk lansia yang dipilih)
        if ($lansiaId) {
            $query->where('lansia_id', $lansiaId);
        }

        $layanan = $query->orderBy('id', 'asc')->get();

        $lansia = Lansia::orderBy('id', 'asc')->get();
        $petugas = Petugas::orderBy('id', 'asc')->get();
        $user = User::orderBy('id', 'asc')->get();

        return view('pages.layanan.index', compact('layanan', 'lansia', 'user', 'loggedInUser', 'petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        // dd($data);
        // Kirim data ke database
        $layanan = Layanan::create($data);
        // dd($layanan);
        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menambahkan Data layanan Baru');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('layanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Layanan $layanan)
    {
        $loggedInUser = Auth::user();
        $layananLansia = Layanan::where('lansia_id', $loggedInUser->lansia_id)->orderBy('id', 'asc')->get();

        return view('pages.layanan.show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $layanan)
    {
        abort_if(Gate::denies('layanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $loggedInUser = Auth::user();
        $lansia = Lansia::orderBy('id', 'asc')->get();

        return view('pages.layanan.edit', compact('layanan', 'lansia', 'loggedInUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layanan $layanan)
    {
        // get all request from frontsite
        $data = $request->all();

        // update to database
        $layanan->update($data);

        alert()->success('Berhasil', 'Berhasil Memperbarui Data Layanan');
        return redirect()->route('layanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layanan $layanan)
    {
        abort_if(Gate::denies('layanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $layanan->delete();

        alert()->success('Berhasil', 'Berhasil Menghapus Data Layanan');
        return back();
    }

    public function print($id)
    {
        $layanan = Layanan::findOrFail($id);
        // dd($layanan);
        // Load view for printing
        $pdf = PDF::loadView('pages.layanan.print', compact('layanan'));

        // Return the generated PDF
        return $pdf->stream('layanan.pdf');
    }
}
