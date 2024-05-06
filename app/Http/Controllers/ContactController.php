<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ContactController extends Controller
{
    private function data()
    {
        if (!Cookie::has('contact'))
        {
            return [];
        }

        // Terima as JSON
        $data = Cookie::get('contact');
        $data = \json_decode($data);
        return $data;
    }

    public function View()
    {
        return \view('contact');
    }

    public function ActionContact(Request $request)
{
    $data = $this->data();
    $nextId = count($data) + 1; 

    $newContact = [
        "id" => $nextId, 
        "name" => $request->input('name'),
        "email" => $request->input('email'),
        "phone" => $request->input('phone'),
        "message" => $request->input('message'),
    ];

    $data[] = $newContact;

    $data = \json_encode($data, false);
    $c = Cookie::make("contact", $data, 60*24*30);
    Cookie::queue($c);

    return redirect()->route('contactlist');
}

public function ContactList(Request $request)
{
    $contacts = $this->data();
    return view('contactlist', compact('contacts'));
}

public function delete($id)
{
    $contacts = $this->data();
    $updatedContacts = [];

    foreach ($contacts as $contact) {
        if (isset($contact->id) && $contact->id != $id) {
            $updatedContacts[] = $contact;
        }
    }

    $data = json_encode($updatedContacts, false);
    $c = Cookie::make("contact", $data, 60*24*30);
    Cookie::queue($c);

    return redirect()->route('contactlist')->with('success', 'Contact deleted');
}

}