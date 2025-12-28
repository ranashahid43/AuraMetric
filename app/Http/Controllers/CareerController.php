<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application; // Make sure you have Application model
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    /**
     * Display the careers page with job listings.
     */
    public function index()
    {
        // Example job data (can later be fetched from DB)
        $jobs = [
            [
                'title' => 'Automation Tester',
                'description' => 'Design and execute automated test scripts for web and mobile applications.',
                'experience' => 'Minimum 3 years',
                'qualification' => 'Bachelor in Computer Science or equivalent',
            ],
            [
                'title' => 'ML & AI Tester',
                'description' => 'Test AI models, evaluate ML performance, and ensure data quality.',
                'experience' => 'Minimum 5 years',
                'qualification' => 'Master/Bachelor in AI, Data Science or related field',
            ],
            [
                'title' => 'Junior Tester',
                'description' => 'Manual and automation testing, assisting senior testers.',
                'experience' => '0-2 years',
                'qualification' => 'Fresh graduates welcome',
            ],
            [
                'title' => 'Internship',
                'description' => 'Learn and contribute to QA projects under guidance.',
                'experience' => '0 years',
                'qualification' => 'Fresh graduates or students',
            ],
        ];

        return view('careers.index', compact('jobs'));
    }

    /**
     * Show the application form.
     */
    public function apply()
    {
        $jobs = [
            'Automation Tester',
            'ML & AI Tester',
            'Junior Tester',
            'Internship',
        ];

        return view('careers.apply', compact('jobs'));
    }

    /**
     * Handle the submission of a career application.
     */
    public function submit(Request $request)
    {
        // Honeypot anti-spam
        if (!empty($request->company_name)) {
            abort(403);
        }

        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail|yahoo|outlook|hotmail|live)\.com$/'
            ],
            'country_code' => 'required|string',
            'phone' => 'required|digits_between:8,15',
            'experience' => 'required|string',
            'position' => 'required|string',
            'cv' => 'required|mimes:pdf,doc,docx|max:51200', // 50MB max
            'portfolio' => 'nullable|mimes:pdf,zip|max:51200',
            'video' => 'nullable|mimes:mp4,mov|max:51200',
            'cover_letter' => 'nullable|string|max:2000',
            'marketing_consent' => 'nullable|accepted',
        ]);

        // Store uploaded files
        $cvPath = $request->file('cv')->store('career-cvs', 'public');
        $portfolioPath = $request->hasFile('portfolio') ? $request->file('portfolio')->store('career-portfolios', 'public') : null;
        $videoPath = $request->hasFile('video') ? $request->file('video')->store('career-videos', 'public') : null;

        // Save application to database
        $application = Application::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'country_code' => $validated['country_code'],
            'phone' => $validated['phone'],
            'experience' => $validated['experience'],
            'position' => $validated['position'],
            'cv_path' => $cvPath,
            'portfolio_path' => $portfolioPath,
            'video_path' => $videoPath,
            'cover_letter' => $validated['cover_letter'] ?? null,
            'marketing_consent' => $request->has('marketing_consent'),
        ]);

        // Optional: send notification email to HR
        // Mail::to('hr@thetestingtech.com')->send(new NewApplicationMail($application));

        // Redirect to thank you page with flash message
        return redirect()->route('thankyou')->with('success', 'Your application has been submitted successfully!');
    }
}
