<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }

    // public function store(ContactRequest $request){
    //     // la validation des données
    //     $data = $request->validated();

    //     Contact::create($data);

    //     //Envoi de mail
    //     Mail::raw($request->message, function($mail) use ($request){
    //         $mail->to('camarafobic@gmail.com')
    //             ->subject($request->sujet)
    //             ->replyTo($request->email);
    //     });

    //     return back()->with('success','Merci de nous avoir contacté. Votre message sera traité de plus bref temps');
    // }
}
