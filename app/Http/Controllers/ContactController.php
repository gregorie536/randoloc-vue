<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $presidentContact = Contact::where('type', 'president')->first();
        $siteContact = Contact::where('type', 'site')->first();

        return Inertia::render('Contact', [
            'presidentContact' => $presidentContact,
            'siteContact' => $siteContact
        ]);
    }

    public function edit()
    {
        $contacts = Contact::all();
        return Inertia::render('Contact/Edit', [
            'contacts' => $contacts
        ]);
    }

    public function update(ContactRequest $request)
    {
        foreach ($request->contacts as $updatedContact) {
            $contact = Contact::find($updatedContact['id']);
            $contact->update($updatedContact);
        }

        return redirect()->route('dashboard')->with('successMessage', 'Mise à jour réussie !');
    }

    public function choice()
    {
        return Inertia::render('Contact/Choice');
    }
}
