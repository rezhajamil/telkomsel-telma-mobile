<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AktivasiAkunNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $token = Str::random(60);

        DB::table('password_resets')->where('email', $notifiable->email)->update([
            'token' => \bcrypt($token),
        ]);
        return (new MailMessage)
            ->subject("Aktivasi Akun TELMA Mobile")
            ->line('Tekan tombol dibawah ini untuk membuat password akun TELMA Mobile Anda')
            ->action('Buat Password Akun', URL::to("/reset-password/") . "/" . $token . '?email=' . urlencode($notifiable->email))
            ->line('Terimakasih telah mendukung kami')
            ->salutation("TELMA");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
