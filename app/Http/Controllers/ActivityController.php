<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('activity_date', 'desc')->get();
        return view('admin.activities.index', compact('activities'));
    }


    public function create()
    {
        return view('admin.activities.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'activity_date' => 'required|date_format:Y-m-d',
            'activities_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('activities_image')) {
            $image = $request->file('activities_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);

            $activity = new Activity();
            $activity->title = $validatedData['title'];
            $activity->description = $validatedData['description'];
            $activity->activity_date = $validatedData['activity_date'];
            $activity->admin_id = Auth::id();
            $activity->image_path = 'storage/images/' . $imageName;

            $activity->save();

            return redirect()->route('admin.activities.index')->with('success', 'Activity created successfully');
        }

        return redirect()->back()->with('error', 'Error uploading image');
    }

    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('admin.activities.show', compact('activity'));
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('admin.activities.edit', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'activity_date' => 'required|date_format:Y-m-d',
            'activities_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $activity = Activity::findOrFail($id);
        $activity->title = $validatedData['title'];
        $activity->description = $validatedData['description'];
        $activity->activity_date = $validatedData['activity_date'];

        if ($request->hasFile('activities_image')) {
            $image = $request->file('activities_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $activity->image_path = 'storage/images/' . $imageName;
        }

        $activity->save();

        return redirect()->route('admin.activities.index')->with('success', 'Activity updated successfully');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);

        if ($activity->image_path) {
            Storage::delete('public/' . $activity->image_path);
        }

        $activity->delete();

        return redirect()->route('admin.activities.index')->with('success', 'Activity deleted successfully');
    }


    public function mindex()
    {
        $activities = Activity::orderBy('activity_date', 'desc')->get();
        return view('member.activities.index', compact('activities'));
    }


    public function mcreate()
    {
        return view('member.activities.create');
    }

    public function mstore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'activity_date' => 'required|date_format:Y-m-d',
            'activities_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('activities_image')) {
            $image = $request->file('activities_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);

            $activity = new Activity();
            $activity->title = $validatedData['title'];
            $activity->description = $validatedData['description'];
            $activity->activity_date = $validatedData['activity_date'];
            $activity->admin_id = Auth::id();
            $activity->image_path = 'storage/images/' . $imageName;

            $activity->save();

            return redirect()->route('member.activities.index')->with('success', 'Activity created successfully');
        }

        return redirect()->back()->with('error', 'Error uploading image');
    }

    public function mshow($id)
    {
        $activity = Activity::findOrFail($id);
        return view('member.activities.show', compact('activity'));
    }

    public function medit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('member.activities.edit', compact('activity'));
    }

    public function mupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'activity_date' => 'required|date_format:Y-m-d',
            'activities_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $activity = Activity::findOrFail($id);
        $activity->title = $validatedData['title'];
        $activity->description = $validatedData['description'];
        $activity->activity_date = $validatedData['activity_date'];

        if ($request->hasFile('activities_image')) {
            $image = $request->file('activities_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $activity->image_path = 'storage/images/' . $imageName;
        }

        $activity->save();

        return redirect()->route('member.activities.index')->with('success', 'Activity updated successfully');
    }

    public function mdestroy($id)
    {
        $activity = Activity::findOrFail($id);

        if ($activity->image_path) {
            Storage::delete('public/' . $activity->image_path);
        }

        $activity->delete();

        return redirect()->route('member.activities.index')->with('success', 'Activity deleted successfully');
    }
}
