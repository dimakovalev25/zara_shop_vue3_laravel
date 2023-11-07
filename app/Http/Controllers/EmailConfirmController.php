<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmOrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailConfirmController extends Controller
{
    public function sentConfirmEmail()
    {
        $title = "title: EmailConfirmController";
        $body = 'body: EmailConfirmController';

        Mail::to('d.nozdryn@gmail.com')->send(new ConfirmOrderMail($title, $body));

        return 'Email sent!';
    }
}
