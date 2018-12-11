<?php

namespace App\Services\Mail;

use Illuminate\Mail\Mailable;

interface EmailService
{
    /**
     * Send an email to an email
     *
     * @param Mailable $mail
     * @param string $emailTo
     * @param array $cc
     * @param array $bcc
     * @return void
     */
    public function send(Mailable $mail, $emailTo, $cc = [], $bcc = []);
}
