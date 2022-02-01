<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show_contact_page()
    {
        return view('guest.contacts.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $contact = Contact::create($validated);

        Mail::to('admin@boolpress.com')->send(new ContactFormMail($contact));

        return redirect()
            ->back()
            ->with('message', 'Thanks for your message!');
    }
}