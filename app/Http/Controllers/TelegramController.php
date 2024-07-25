<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function telegram(Lansia $lansia)
    {
        // Middleware Gate
        abort_if(Gate::denies('telegram_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = auth()->user();
        $lansiaId = $user->lansia_id;
        $lansia = Lansia::findOrFail($lansiaId);
        return view('pages.telegram.index', compact('lansia'));
    }

    public function sendTelegram(Request $request, Lansia $lansia)
    {
        // Validasi input
        $request->validate([
            'telegram_username' => 'required|string',
        ]);

        // Username Telegram
        $telegramUsername = $request->telegram_username;

        // URL untuk membuka percakapan dengan bot dan mengirim pesan /start
        $botUsername = env('TELEGRAM_BOT_USERNAME');
        $startUrl = "https://t.me/$botUsername?start";

        // Simpan username dan ID lansia ke database
        $lansia->telegram_username = $telegramUsername;
        $lansia->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Mengirimkan Telegram Username');
        return back();
    }

    public function telegramWebhook()
    {
        $telegram = new Api('7241108765:AAHqNh_LYt-vAdHxdWtVpFlksPJ7r5wgBiE');
        $update = $telegram->getWebhookUpdate();

        // $message = $update->getMessage();

        if (isset($update['message'])) {
            $isiText = $update['message']['text'];
            $chatId = $update['message']['from']['id'];

            $telegram->sendMessage([
                'chat_id' => 'zulkar30',
                'text' => 'Pesan dari webhook'
            ]);
        } else {
            $telegram->sendMessage([
                'chat_id' => '1775044500',
                'text' => 'Webhook kosong'
            ]);
        }
    }
}
