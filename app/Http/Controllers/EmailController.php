<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Mail;

class EmailController extends Controller
{
    public function send_email()
    {
        $mailData = [
            'title' => 'Mail from Book laravel Framework 11',
            'body' => 'This is for testing email using smtp.'
        ];
        
        Mail::to('techasit6960@gmail.com')->send(new TestMail($mailData));

        dd("Email has been sent successfully");
    }
}
