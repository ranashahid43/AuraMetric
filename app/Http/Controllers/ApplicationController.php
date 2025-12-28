<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        // 1. Strict Validation
        $validated = $request->validate([
            'first_name'   => 'required|string|trim|max:255',
            'last_name'    => 'required|string|trim|max:255',
            // email:rfc,dns checks if the domain actually has MX records
            'email'        => 'required|email:rfc,dns|max:255',
            // Regex: Must start with + then country code (e.g., +92 or +39)
            'phone'        => ['required', 'regex:/^\+[1-9]\d{1,14}$/'],
            'position'     => 'required|string',
            'cover_letter' => 'required|string|min:10',
            // CV is now COMPULSORY and must be PDF
            'cv'           => 'required|file|mimes:pdf|max:5120', 
            'portfolio'    => 'nullable|file|mimes:pdf,zip|max:10240',
            'video'        => 'nullable|file|mimes:mp4,mov|max:20480',
            'marketing'    => 'nullable',
            'agree'        => 'accepted', // Compulsory Privacy Check
        ], [
            // Custom Error Messages
            'phone.regex' => 'The phone number must include a country code starting with + (e.g., +92...)',
            'cv.required' => 'Uploading your CV (PDF) is compulsory.',
            'agree.accepted' => 'You must agree to the privacy policy to submit your application.'
        ]);

        // 2. Handle File Uploads
        if ($request->hasFile('cv')) {
            $validated['cv'] = $request->file('cv')->store('applications/cvs', 'public');
        }

        if ($request->hasFile('portfolio')) {
            $validated['portfolio'] = $request->file('portfolio')->store('applications/portfolios', 'public');
        }

        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('applications/videos', 'public');
        }

        // 3. Map additional data
        $validated['marketing_optin'] = $request->has('marketing');
        
        // Remove 'agree' from data before saving to DB as it's usually not a column
        unset($validated['agree'], $validated['marketing']);

        // 4. Save to Database
        Application::create($validated);

        // 5. Success Response
        return redirect()->route('thankyou')->with('success', 'Application submitted successfully!');
    }
}
