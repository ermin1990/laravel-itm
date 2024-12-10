<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function allContacts(){

        $contacts = ContactModel::all();
        $compact = [
            "contacts" => $contacts
        ];


        return view('admin.contacts', $compact);
    }


    public function sendContact(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
            'subject' => 'required|string',
            'message' => 'required|string|min:5',
        ]);

        ContactModel::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);
        return redirect()->route('admin.allcontacts');
    }
}
