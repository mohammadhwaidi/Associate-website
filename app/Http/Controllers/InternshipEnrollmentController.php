<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\InternshipEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InternshipEnrollmentController extends Controller
{
    public function index()
    {

        $internshipEnrollments = InternshipEnrollment::orderBy('created_at', 'desc')->get();
        return view('admin.internships.enrollments.index', compact('internshipEnrollments'));
    }

    public function create()
    {
        $internships = Internship::all();
        return view('admin.internships.enrollments.create', compact('internships'));
    }

    public function store(Request $request)
    {
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

        return redirect()->route('admin.internships.enrollments.index')->with('success', 'Enrollment created successfully');
    }

    public function show($id)
    {
        $enrollment = InternshipEnrollment::findOrFail($id);
        return view('admin.internships.enrollments.show', compact('enrollment'));
    }

    public function edit($id)
    {
        $enrollment = InternshipEnrollment::findOrFail($id);
        $internships = Internship::all();
        return view('admin.internships.enrollments.edit', compact('enrollment', 'internships'));
    }

    public function update(Request $request, $id)
    {
        $enrollment = InternshipEnrollment::findOrFail($id);

        $request->validate([
            'internship_id' => 'required|exists:internships,id',
            'enrollment_date' => 'required|date',
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'education' => 'required|string',
            'cv' => 'nullable|file|mimes:pdf|max:2048', // Adjust the allowed file types and size
        ]);

        if ($request->hasFile('cv')) {
            // Store the new CV file
            $cvPath = $request->file('cv')->store('public/cv');
            // Delete the old CV file
            Storage::delete($enrollment->cv);
            // Update the CV path
            $enrollment->update(['cv' => $cvPath]);
        }

        // Update other enrollment fields
        $enrollment->update([
            'internship_id' => $request->input('internship_id'),
            'enrollment_date' => $request->input('enrollment_date'),
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'education' => $request->input('education'),
        ]);

        return redirect()->route('admin.internships.enrollments.index')->with('success', 'Enrollment updated successfully');
    }

    public function destroy($id)
    {
        $enrollment = InternshipEnrollment::findOrFail($id);

        // Delete the associated CV file
        Storage::delete($enrollment->cv);

        $enrollment->delete();

        return redirect()->route('admin.internships.enrollments.index')->with('success', 'Enrollment deleted successfully');
    }
}
