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
    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('layanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loggedInUser = Auth::user();
        $layananPetugas = Layanan::where('petugas_id', $loggedInUser->petugas_id)->orderBy('id', 'asc')->get();
        $layananLansia = Layanan::where('lansia_id', $loggedInUser->lansia_id)->orderBy('id', 'asc')->get();
        $layanan = Layanan::orderBy('id', 'asc')->get();
        $lansia = Lansia::orderBy('id', 'asc')->get();
        $petugas = Petugas::orderBy('id', 'asc')->get();
        $user = User::orderBy('id', 'asc')->get();
        // dd($layanan);
        return view('pages.layanan.index', compact('layanan', 'lansia', 'user', 'loggedInUser', 'petugas', 'layananPetugas', 'layananLansia'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function print($id)
    {
        $layanan = Layanan::findOrFail($id);

        // Load view for printing
        $pdf = PDF::loadView('pages.layanan.print', compact('layanan'));

        // Return the generated PDF
        return $pdf->stream('layanan.pdf');
    }
}
