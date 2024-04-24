<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{


    public function showEnrollments($id)
    {
        $event = Event::findOrFail($id);
        $enrollments = $event->enrollments;

        return view('admin.events.enrollments', compact('event', 'enrollments'));
    }

    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'events_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $adminId = auth()->id();

        $eventData = $request->only(['title', 'description', 'event_date', 'location']);
        $eventData['admin_id'] = $adminId;

        if ($request->hasFile('events_image')) {
            $imagePath = $request->file('events_image')->store('public/event_images');
            $eventData['events_image'] = str_replace('public/', 'storage/', $imagePath);
        }

        Event::create($eventData);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully');
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'events_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $eventData = $request->only(['title', 'description', 'event_date', 'location', 'admin_id']);
        if ($request->hasFile('events_image')) {
            $imagePath = $request->file('events_image')->store('public/event_images');
            $eventData['events_image'] = str_replace('public/', 'storage/', $imagePath);
        }
        $event->update($eventData);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully');
    }

    public function mshowEnrollments($id)
    {
        $event = Event::findOrFail($id);
        $enrollments = $event->enrollments;

        return view('member.events.enrollments', compact('event', 'enrollments'));
    }

    public function mindex()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('member.events.index', compact('events'));
    }

    public function mcreate()
    {
        return view('member.events.create');
    }

    public function mstore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'events_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $adminId = auth()->id();

        $eventData = $request->only(['title', 'description', 'event_date', 'location']);
        $eventData['admin_id'] = $adminId;

        if ($request->hasFile('events_image')) {
            $imagePath = $request->file('events_image')->store('public/event_images');
            $eventData['events_image'] = str_replace('public/', 'storage/', $imagePath);
        }

        Event::create($eventData);

        return redirect()->route('member.events.index')->with('success', 'Event created successfully');
    }


    public function mshow($id)
    {
        $event = Event::findOrFail($id);
        return view('member.events.show', compact('event'));
    }

    public function medit($id)
    {
        $event = Event::findOrFail($id);
        return view('member.events.edit', compact('event'));
    }

    public function mupdate(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'events_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $eventData = $request->only(['title', 'description', 'event_date', 'location', 'admin_id']);
        if ($request->hasFile('events_image')) {
            $imagePath = $request->file('events_image')->store('public/event_images');
            $eventData['events_image'] = str_replace('public/', 'storage/', $imagePath);
        }
        $event->update($eventData);

        return redirect()->route('member.events.index')->with('success', 'Event updated successfully');
    }

    public function mdestroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('member.events.index')->with('success', 'Event deleted successfully');
    }
}
