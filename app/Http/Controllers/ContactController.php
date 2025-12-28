<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
{
    $data = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'email'      => 'required|email|max:255',
        'phone'      => 'nullable|string|max:20',
        'message'    => 'required|string|max:2000',
    ]);

    // Save to database
    Contact::create($data);

    // Optional: send email
    Mail::raw($data['message'], function ($message) use ($data) {
        $message->to('info@thetestingtech.com')
                ->subject('Contact Form: ' . $data['first_name'] . ' ' . $data['last_name'])
                ->replyTo($data['email']);
    });

    return redirect()->route('thankyou')->with('success', 'Message sent!');
}
}
