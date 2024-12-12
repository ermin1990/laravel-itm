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
            return view('admin.contacts.allcontacts', compact('contacts'));
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
    public function delete(ContactModel$contact)
    {
        try {
            $contact->delete();
            return redirect()->back()->with("success", "Kontakt je obrisan");
        }catch (\Throwable $th) {
            $errors = "Nemoguće brisati kontakt";
            return redirect()->back()->withErrors($errors);
        }
    }
    public function edit(ContactModel $contact){

        try{
            return view("admin.contacts.edit-contacts", compact("contact"));
        }
        catch(\Throwable $th){
            $errors = "Nemoguće editovati kontakt";
            return redirect()->back()->withErrors($errors);
        }
    }
    public function update(Request $request, ContactModel $contact)
    {
        $request->validate([
            'email' => 'required|email|string',
            'subject' => 'required|string',
            'message' => 'required|string|min:5',
        ]);
        $contact ->update([
            "email"=>$request['email'],
            "subject"=>$request['subject'],
            "message"=>$request['message']
        ]);
        return redirect()->route('admin.contacts');
    }
}
