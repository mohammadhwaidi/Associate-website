<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventEnrollment;


class EventEnrollmentController extends Controller
{


    public function index()
    {
        $enrollments = EventEnrollment::all();
        return view('admin.events.enrollments.index', ['enrollments' => $enrollments]);
    }

    public function create()
    {
        $events = Event::all();
        return view('admin.events.enrollments.create', compact('events'));
    }
    public function store(Request $request)
    {
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

        return redirect()->route('admin.events.enrollments.index')->with('success', 'Enrollment created successfully');
    }



    public function show($id)
    {
        $enrollment = EventEnrollment::findOrFail($id);
        return view('admin.events.enrollments.show', ['enrollment' => $enrollment]);
    }

    public function edit($id)
    {
        $enrollment = EventEnrollment::findOrFail($id);
        return view('admin.events.enrollments.edit', ['enrollment' => $enrollment]);
    }

    public function update(Request $request, $id)
    {
        $enrollment = EventEnrollment::findOrFail($id);

        $validatedData = $request->validate([
            'event_id' => 'required|numeric',
            'enrollment_date' => 'required|date',
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        $enrollment->update($validatedData);

        return redirect()->route('admin.events.enrollments.index')->with('success', 'Enrollment updated successfully');
    }

    public function destroy($id)
    {
        $enrollment = EventEnrollment::findOrFail($id);
        $enrollment->delete();

        return redirect()->route('admin.events.enrollments.index')->with('success', 'Enrollment deleted successfully');
    }
}
