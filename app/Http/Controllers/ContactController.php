<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    //

    // page contact avec formulaire de contact
    public function index()
    {
        return view('contact.index');
    }


    // fonction d'envoi du mail
    public function send(Request $request)
    {

        $details = $request->validate([
            'name' => 'required|min:2|string',
            'email' => 'email|required|min:4',
            'subject' => 'required|min:4',
            'message' => 'required|min:6',
        ]);

        $ip = $request->ip();

        $success = 'Votre message a bien été envoyé.';

        Mail::to('contact@guilderz.xyz')->send(new ContactMail($details, $ip));

        return redirect()->route('contact')->withSuccess($success);

    }


}
