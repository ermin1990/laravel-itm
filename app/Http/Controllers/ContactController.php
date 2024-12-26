<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public $contactRepository;
    public function __construct(){
        $this->contactRepository = new ContactRepository();
    }

    public function index()
    {
        return view('contact');
    }

    public function allContacts(){

        $compact = [
            "contacts" => $this->contactRepository->getAll()
        ];

        return view('admin.contacts.allcontacts', $compact);
    }


    public function sendContact(SaveContactRequest $request)
    {
        $this->contactRepository->create($request);
        return redirect()->route('contact')->with("success", "Poruka je poslata");
    }

    public function delete($contact)
    {
        try {
            $this->contactRepository->delete($contact);
            return redirect()->back()->with("success", "Kontakt je obrisan");
        }catch (\Throwable $th) {
            $errors = "Nemoguće brisati kontakt";
            return redirect()->back()->withErrors($errors);
        }
    }


    public function edit($contact){

        try{
            $contact = $this->contactRepository->getOneContact($contact);
            return view("admin.contacts.edit-contacts", compact("contact"));
        }
        catch(\Throwable $th){
            $errors = "Nemoguće editovati kontakt";
            return redirect()->back()->withErrors($errors);
        }
    }


    public function update(SaveContactRequest $request, $contact)
    {
        $this->contactRepository->updateContact($request,$contact);
        return redirect()->route('allcontacts');
    }
}
