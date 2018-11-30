<?php

namespace App\Services\Mail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class LaravelEmailService implements EmailService
{
    public function send(Mailable $mail, $emailTo, $cc = [], $bcc = [])
    {
        Mail::to($emailTo)
            ->cc($cc)
            ->bcc($bcc)
            ->queue($mail);
    }
}
