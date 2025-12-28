<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form
        $validated = $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'nullable|string|max:30',
            'position'     => 'required|string|max:255',
            'cover_letter' => 'nullable|string',
            'cv'           => 'nullable|file|mimes:pdf,doc,docx',
            'portfolio'    => 'nullable|file|mimes:pdf,zip',
            'video'        => 'nullable|file|mimes:mp4,mov',
            'marketing'    => 'nullable',
            'agree'        => 'accepted',
        ]);

        // Handle file uploads
        if ($request->hasFile('cv')) {
            $validated['cv'] = $request->file('cv')->store('cvs', 'public');
        }

        if ($request->hasFile('portfolio')) {
            $validated['portfolio'] = $request->file('portfolio')->store('portfolio', 'public');
        }

        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos', 'public');
        }

        // Map checkbox
        $validated['marketing_optin'] = $request->has('marketing') ? 1 : 0;

        // Save data
        Application::create($validated);

        // Redirect to thankyou page on success
        return redirect()->route('thankyou');
    }
}
