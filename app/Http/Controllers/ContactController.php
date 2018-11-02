<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $contact = new Contact;
        $contact->nameContact = $request->nameContact;
        $contact->emailContact = $request->emailContact;
        $contact->msgContact = $request->msgContact;
        $contact->subjectContact = $request->subjectContact;
        $contact->save();

        $mailable = new contactMailable($contact);
        Mail::to('charlomartineau@gmail.com')->send($mailable);

        return redirect()->back()->with('mailing', 'Mail sent with success !');
    }
}
