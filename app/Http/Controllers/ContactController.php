<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailableClass;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|max:15',
            'message' => 'required',
        ]);

        Mail::to(env('CONTACT_FORM_EMAIL'))->send(new ContactFormMailable($data));

        return redirect('contact')->with('message', 'Thanks for your message. We\'ll be in touch soon. If this is urgent, please call at 906-349-1202. Thank you for your interest and we look forward to working with you!');
    }
}
