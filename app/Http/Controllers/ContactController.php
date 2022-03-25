<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{

    public function index()
    {

        return view('Contact.index');
    }
    public function SendEmail(Request $request)
    {
        $content = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'msg' => $request->input('msg'),
        ];

        Mail::to('mwangialex26@gmail.com')->send(new ContactMail($content));

        return back()->with('status', 'Your message has been sent successfully');
    }
}
