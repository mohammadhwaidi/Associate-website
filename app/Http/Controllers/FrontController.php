<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Event;
use App\Models\EventEnrollment;
use App\Models\Internship;
use App\Models\InternshipEnrollment;
use App\Models\Post;
use App\Models\SlideShow;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FrontController extends Controller
{
  public function guestIndex()
    {
        $slideshows = SlideShow::orderBy('created_at', 'desc')->take(3)->get();
        $posts = Post::orderBy('created_at', 'desc')->take(6)->get();
        return view('welcome', compact('slideshows', 'posts'));
    }

    public function guestIndex2(Request $request)
    {
        $slideshows = SlideShow::orderBy('created_at', 'desc')->take(3)->get();
        $posts = Post::orderBy('created_at', 'desc')->take(6)->get();

        // Return JSON response
        return response()->json(compact('slideshows', 'posts'));
    }



    public function blog()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5); // Change 'paginate' number according to your desired posts per page
        return view('blog', compact('posts'));
    }


    public function events()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(5); // Change 'paginate' number according to your desired posts per page
        return view('events', compact('events'));

    }
    public function Estore(Request $request)
    { if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to submit the form.');
    }
        $validatedData = $request->validate([
            'event_id' => 'required|numeric',
            'enrollment_date' => 'required|date',
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        // Get the authenticated user's ID
        $user_id = auth()->id();

        $validatedData['user_id'] = $user_id; // Set the 'user_id' in the validated data

        $enrollment = EventEnrollment::create($validatedData); // Create the enrollment

        return redirect()->route('events')->with('success', 'Enrollment created successfully');
    }
    public function showEventEnrollmentForm()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('eventsEn', compact('events'));
    }


    public function internship()
    {
        $internships = Internship::orderBy('created_at', 'desc')->paginate(5);
        return view('internship', compact('internships'));
    }

    public function showInternshipEnrollmentForm()
    {
        $internships = Internship::orderBy('created_at', 'desc')->get();
        return view('internshipEn', compact('internships'));
    }

    public function storeInternshipEnrollment(Request $request)
    {  if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to submit the form.');
    }
        $request->validate([
            'internship_id' => 'required|numeric',
            'enrollment_date' => 'required|date',
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'education' => 'required|string',
            'cv' => 'required|mimes:pdf,doc,docx|max:10240', // Adjust file types as needed
        ]);

        $userId = Auth::id();
        $cvPath = $request->file('cv')->store('public/cv');

        $enrollmentData = $request->except('cv');
        $enrollmentData['user_id'] = $userId;
        $enrollmentData['cv'] = str_replace('public/', 'storage/', $cvPath);

        InternshipEnrollment::create($enrollmentData);


return redirect()->route('internship')->with('success', 'Enrollment created successfully');
    }
    public function storeTestimonial(Request $request)
    {
        {
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Please log in to submit the form.');
            }
            $validatedData = $request->validate([
                'content' => 'required',
                'publish_date' => 'required|date_format:Y-m-d',
                'testimonials_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $image = $request->file('testimonials_image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/testimonials_images', $imageName);

            $testimonial = Testimonial::create([
                'Content' => $validatedData['content'],
                'PublishDate' => $validatedData['publish_date'],
                'UserID' => Auth::id(),
                'TestimonialImage' => 'storage/testimonials_images/' . $imageName,
            ]);

            return redirect()->route('testimonials')->with('success', 'Testimonial created successfully');
        }

    }


    public function profileEdit(Request $request): View
    {
        return view('Userprofile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function profileUpdate(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('Userprofile.edit')->with('status', 'profile-updated');
    }}
