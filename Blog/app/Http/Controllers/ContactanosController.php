<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index()
    {
        return view('contactanos.index');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'content' => 'required'
        ]);

        $correo = new ContactanosMailable($request->all());
        Mail::to('bmessaoui96@gmail.com')->send($correo);
        return redirect()->route('contactanos.index')->with('info', 'Mensaje enviado'); // mandado una variable de sesion
    }
}
