<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{

    public function showEnrollments($id)
    {
        $internship = Internship::findOrFail($id);
        $enrollments = $internship->enrollments;

        return view('admin.internships.enrollments', compact('internship', 'enrollments'));
    }
    public function index()
    {
        $internships = Internship::orderBy('created_at', 'desc')->get();
        return view('admin.internships.index', compact('internships'));
    }

    public function create()
    {
        return view('admin.internships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string',
            'internship_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add other fields and their validation rules as needed
        ]);

        $adminId = auth()->id();

        $internshipData = $request->only(['title', 'description', 'start_date', 'end_date', 'location']);
        $internshipData['admin_id'] = $adminId;

        if ($request->hasFile('internship_image')) {
            $imagePath = $request->file('internship_image')->store('public/internship_images');
            $internshipData['internship_image'] = str_replace('public/', 'storage/', $imagePath);
        }

        Internship::create($internshipData);

        return redirect()->route('admin.internships.index')->with('success', 'Internship created successfully');
    }


    public function show($id)
    {
        $internship = Internship::findOrFail($id);
        return view('admin.internships.show', compact('internship'));
    }

    public function edit($id)
    {
        $internship = Internship::findOrFail($id);
        return view('admin.internships.edit', compact('internship'));
    }

    public function update(Request $request, $id)
    {
        $internship = Internship::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string',
            'internship_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add other fields and their validation rules as needed
        ]);

        $internship->update($request->all());

        return redirect()->route('admin.internships.index')->with('success', 'Internship updated successfully');
    }

    public function destroy($id)
    {
        $internship = Internship::findOrFail($id);
        $internship->delete();

        return redirect()->route('admin.internships.index')->with('success', 'Internship deleted successfully');
    }


    public function mshowEnrollments($id)
    {
        $internship = Internship::findOrFail($id);
        $enrollments = $internship->enrollments;

        return view('member.internships.enrollments', compact('internship', 'enrollments'));
    }
    public function mindex()
    {
        $internships = Internship::orderBy('created_at', 'desc')->get();
        return view('member.internships.index', compact('internships'));
    }

    public function mcreate()
    {
        return view('member.internships.create');
    }

    public function mstore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string',
            'internship_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add other fields and their validation rules as needed
        ]);

        $adminId = auth()->id();

        $internshipData = $request->only(['title', 'description', 'start_date', 'end_date', 'location']);
        $internshipData['admin_id'] = $adminId;

        if ($request->hasFile('internship_image')) {
            $imagePath = $request->file('internship_image')->store('public/internship_images');
            $internshipData['internship_image'] = str_replace('public/', 'storage/', $imagePath);
        }

        Internship::create($internshipData);

        return redirect()->route('member.internships.index')->with('success', 'Internship created successfully');
    }


    public function mshow($id)
    {
        $internship = Internship::findOrFail($id);
        return view('member.internships.show', compact('internship'));
    }

    public function medit($id)
    {
        $internship = Internship::findOrFail($id);
        return view('member.internships.edit', compact('internship'));
    }

    public function mupdate(Request $request, $id)
    {
        $internship = Internship::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string',
            'internship_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add other fields and their validation rules as needed
        ]);

        $internship->update($request->all());

        return redirect()->route('member.internships.index')->with('success', 'Internship updated successfully');
    }

    public function mdestroy($id)
    {
        $internship = Internship::findOrFail($id);
        $internship->delete();

        return redirect()->route('member.internships.index')->with('success', 'Internship deleted successfully');
    }
}
