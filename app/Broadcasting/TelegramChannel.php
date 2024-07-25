<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
// use App\Notifications\TelegramMessage;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        // Get the message from the notification
        $message = $notification->toTelegram($notifiable);

        // Get the recipient's chat ID from the notifiable model
        $chatId = $notifiable->routeNotificationFor('telegram');

        // Create a TelegramMessage instance with message content
        $telegramMessage = TelegramMessage::create()
            ->to($chatId)
            ->content($message->content);

        // Send the message using TelegramChannel
        $this->sendMessage($telegramMessage);
    }

    /**
     * Send the Telegram message.
     *
     * @param  \NotificationChannels\Telegram\TelegramMessage  $message
     * @return void
     */
    protected function sendMessage(TelegramMessage $message)
    {
        // Use your preferred way to send the message (e.g., via HTTP request to Telegram API)
        // Example: using Guzzle HTTP client
        $response = \Http::post('https://api.telegram.org/bot'.config('services.telegram.bot_token').'/sendMessage', [
            'chat_id' => $message->to,
            'text' => $message->content,
        ]);

        // Check response status or handle errors if necessary
        if ($response->failed()) {
            // Handle failed request
            \Log::error('Failed to send Telegram message: ' . $response->body());
            // You can throw an exception or handle accordingly
        }
    }
}
