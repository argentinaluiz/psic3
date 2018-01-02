<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class MyResetPasswordNotification extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage())
        ->line('Você recebeu esta mensagem, porque solicitou uma requisição de redefinição de senha.')
        ->action('Reset Password', url(config('app.url').route('password.reset', $this->token, false)))
        ->line('Caso não tenha feito essa solicitação, não necessita realizar nenhuma ação.');
    }
}
