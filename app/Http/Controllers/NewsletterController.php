<?php

namespace App\Http\Controllers;
use App\Newsletter;
use App\Mail\NewsletterMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\NewsletterRequest;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request)
    {
        $news = new Newsletter;
        $news->newsMail = $request->newsMail;

        $news->save();

        $mailable = new NewsletterMailable($news);
        Mail::to('charlomartineau@gmail.com')->send($mailable);

        return redirect()->back()->with('mailing', 'Mail sent with success !');
    }
}
