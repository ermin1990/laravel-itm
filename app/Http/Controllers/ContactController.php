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


        return view('admin.allcontacts', $compact);
    }
}
