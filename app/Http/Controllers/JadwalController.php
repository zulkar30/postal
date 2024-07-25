<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Lansia;
use App\Notifications\NotifikasiJadwal;
use Illuminate\Http\Request;
use Gate;
use File;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class JadwalController extends Controller
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
        abort_if(Gate::denies('jadwal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwal = Jadwal::orderBy('id', 'asc')->get();
        return view('pages.jadwal.index', compact('jadwal'));
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
        $jadwal = Jadwal::create($data);

        $this->sendScheduleToLansia($jadwal);

        // dd($jadwal);
        // Sweetalert
        alert()->success('Berhasil', 'Jadwal Berhasil dibuat dan Notifikasi Berhasil dikirim');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('jadwal.index');
    }

    private function sendScheduleToLansia($jadwal)
    {
        $lansias = Lansia::all();
        foreach ($lansias as $lansia) {
            $message = "Jadwal Pemeriksaan Baru:\n"
                     . "Tanggal: " . $jadwal->tanggal_periksa . "\n"
                     . "Jam: " . $jadwal->jam_periksa . "\n"
                     . "Lokasi: " . $jadwal->lokasi_periksa;

            $this->sendMessageToTelegram($lansia->chat_id, $message);
        }
    }

    private function sendMessageToTelegram($chatId, $message)
    {
        $token = '7496058716:AAFs2388l9pynhNgIEhOuD7aQlq8_AOwWkg';
        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        $response = Http::post($url, [
            'chat_id' => $chatId,
            'text' => $message
        ]);

        return $response->json();
    }

    // private function sendTelegramNotifications($jadwal)
    // {
    //     $lansias = Lansia::all();
    //     $token = '7496058716:AAFs2388l9pynhNgIEhOuD7aQlq8_AOwWkg';

    //     foreach ($lansias as $lansia) {
    //         $chat_id = $lansia->chat_id;
    //         $message = "Jadwal baru telah ditambahkan:\n\nTanggal: " . $jadwal->tanggal . "\nJam: " . $jadwal->jam . "\nLokasi: " . $jadwal->lokasi;

    //         $response = Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
    //             'chat_id' => $chat_id,
    //             'text' => $message,
    //         ]);
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // return($jadwal);
        return view('pages.jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        // get all request from frontsite
        $data = $request->all();

        // update to database
        $jadwal->update($data);

        alert()->success('Berhasil', 'Berhasil Memperbarui Data Jadwal');
        return redirect()->route('jadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $jadwal->delete();

        alert()->success('Berhasil', 'Berhasil Menghapus Data Jadwal');
        return back();
    }
}
