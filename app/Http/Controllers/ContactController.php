<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
{
    $contact = Contact::first();
    // dd($contact->toArray());


    return Inertia::render('Contact', ['contact' => $contact]);
}


//     public function edit()
//     {
//         $contact = Contact::first();
//         return inertia('Contact/Edit', ['contact' => $contact]);
//     }

//     public function update(Request $request)
//     {
//         $contact = Contact::first();
//         $contact->update($request->all());

//         return redirect()->route('contact.index')->with('success', 'Contact modifié avec succès.');
//     }
}
