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


        return view('admin.contacts.allcontacts', $compact);
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
        return redirect()->route('contact')->with("success", "Poruka je poslata");
    }

    public function delete($contact)
    {
        try {
            $contact = ContactModel::where("id", $contact)->first();
            $contact->delete();
            return redirect()->back()->with("success", "Kontakt je obrisan");
        }catch (\Throwable $th) {
            $errors = "Nemoguće brisati kontakt";
            return redirect()->back()->withErrors($errors);
        }
    }


    public function edit($contact){

        try{
            $contact = ContactModel::where("id", $contact)->first();
            return view("admin.contacts.edit-contacts", compact("contact"));
        }
        catch(\Throwable $th){
            $errors = "Nemoguće editovati kontakt";
            return redirect()->back()->withErrors($errors);
        }
    }


    public function update(Request $request, $contact)
    {
        $request->validate([
            'email' => 'required|email|string',
            'subject' => 'required|string',
            'message' => 'required|string|min:5',
        ]);
        $contact = ContactModel::where("id", $contact)->first();
        $contact ->update([
            "email"=>$request['email'],
            "subject"=>$request['subject'],
            "message"=>$request['message']
        ]);
        return redirect()->route('admin.contacts');
    }
}
