<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function __construct()
    {
        $this->telegram = new Api('7241108765:AAHqNh_LYt-vAdHxdWtVpFlksPJ7r5wgBiE');
    }

    public function telegram(Lansia $lansia)
    {
        $user = auth()->user();
        $lansiaId = $user->lansia_id;
        $lansia = Lansia::findOrFail($lansiaId);
        return view('pages.telegram.index', compact('lansia'));
    }

    public function messages()
    {
        return $this->telegram->getUpdates();
    }

    public function sendMessages($id)
    {
        return $this->telegram->sendMessage([
            'chat_id' => $id,
            'text' => 'Pesan cobalagi'
        ]);
    }

    public function setWebhook()
    {
        $url = 'https://postal.my.id';
        $this->telegram->setWebhook([
            'url' => $url.'/telegram/webhook/'.'7241108765:AAHqNh_LYt-vAdHxdWtVpFlksPJ7r5wgBiE'
        ]);
        return ['message' => 'Webhook is already set'];
    }

    public function deleteWebhook()
    {
        $this->telegram->removeWebhook();
        return ['message' => 'Webhook is already delete'];
    }

    public function webhook($token, Request $request)
    {
        $chatId = $request['message']['chat']['id'];
        $userName = $request['message']['from']['first_name'];
        $teleName = $request['message']['from']['username'];

        $lansia = Lansia::where('telegram_username', $teleName)->first();
        $lansia->chat_id = $chatId;
        $lansia->save();

        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => 'Terimakasih Bapak/Ibu '. $userName . ' Karena Telah Menghubungi Kami, Silahkan Tunggu Informasi Jadwal Kegiatan Dari POSTAL'
        ]);
        // Storage::put('logs.txt', json_encode($request->all(), JSON_PRETTY_PRINT));
        Storage::put('logs.txt', $lansia);
    }
}
