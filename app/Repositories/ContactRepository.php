<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository
{
    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function updateContact($request, $id)
    {
        $con = self::getOneContact($id);
        return $con->update([
            "email" => $request['email'],
            "subject" => $request['subject'],
            "message" => $request['message']
        ]);
    }

    public function getOneContact($id)
    {
        return ContactModel::where("id", $id)->first();

    }

    public function create($request)
    {
        return ContactModel::create([
            "email" => $request['email'],
            "subject" => $request['subject'],
            "message" => $request['message']
        ]);

    }


    public function getAll()
    {
        return ContactModel::all();
    }

    public function delete($id){
        return ContactModel::where("id", $id)->delete();
    }

}
