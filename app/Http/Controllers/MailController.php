<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function SendEmail()
    {
        $content = [
            'title' => 'Mail from Coding Pro',
            'body' => 'Testing mail using Laravel 8',
        ];

        $vSend =   new TestMail($content);

        Mail::to('mwangialex26@gmail.com')->send($vSend);

        return "Email Sent successfully";
    }
}
