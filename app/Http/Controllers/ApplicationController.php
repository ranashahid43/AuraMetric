<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function submit(Request $request)
{
    $request->validate([
        'first_name'   => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
        'last_name'    => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
        'email'        => 'required|email:rfc,dns', // Strict email check
        'phone'        => ['required', 'regex:/^\+[1-9]\d{1,14}$/'], // Starts with +CountryCode
        'position'     => 'required|string',
        'cover_letter' => 'required|string|min:10',
        'cv'           => 'required|mimes:pdf,doc,docx|max:5120',
        'portfolio'    => 'nullable|mimes:pdf,zip|max:10240',
        'video'        => 'nullable|mimes:mp4,mov|max:20480',
        'agree'        => 'accepted',
    ], [
        'first_name.regex' => 'First name must contain only English letters.',
        'last_name.regex'  => 'Last name must contain only English letters.',
        'phone.regex'      => 'Phone must start with + and include country code (e.g., +91, +92).',
        'cv.mimes'         => 'Only PDF, DOC, and DOCX files are allowed for CV.',
    ]);

    // Save logic here...
    return redirect()->back()->with('success', 'Application submitted!');
}
}
