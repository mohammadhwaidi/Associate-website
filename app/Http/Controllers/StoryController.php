<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::orderBy('created_at', 'desc')->get();
        $imageUrl = $stories->isNotEmpty() ? asset($stories[0]->image) : ''; // Assuming the image URL is stored correctly in the database
        return view('admin.stories.index', compact('stories', 'imageUrl'));
    }


public function create()
{
return view('admin.stories.create');
}

public function store(Request $request)
{
$validatedData = $request->validate([
'title' => 'required',
'content' => 'required',
'publish_date' => 'required|date_format:Y-m-d',
'story_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
]);

if ($request->hasFile('story_image')) {
$image = $request->file('story_image');
$imageName = time() . '_' . $image->getClientOriginalName();

// Store the image in the storage folder
$image->storeAs('public/images', $imageName);

$story = new Story();
$story->title = $validatedData['title'];
$story->content = $validatedData['content'];
$story->publish_date = $validatedData['publish_date'];
$story->user_id = Auth::id();
$story->image = 'storage/images/' . $imageName; // Store this path in the database

$story->save();

return redirect()->route('admin.stories.index')->with('success', 'Story created successfully');
}

return redirect()->back()->with('error', 'Error uploading image');
}

public function show($id)
{
$story = Story::findOrFail($id);
return view('admin.stories.show', compact('story'));
}

public function edit($id)
{
$story = Story::findOrFail($id);
return view('admin.stories.edit', compact('story'));
}

public function update(Request $request, $id)
{
$validatedData = $request->validate([
'title' => 'required',
'content' => 'required',
'publish_date' => 'required|date_format:Y-m-d',
'story_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
]);

$story = Story::findOrFail($id);
$story->title = $validatedData['title'];
$story->content = $validatedData['content'];
$story->publish_date = $validatedData['publish_date'];

if ($request->hasFile('story_image')) {
$image = $request->file('story_image');
$imageName = time() . '_' . $image->getClientOriginalName();
$image->storeAs('public/images', $imageName);
$story->image = 'storage/images/' . $imageName;
}

$story->save();

return redirect()->route('admin.stories.index')->with('success', 'Story updated successfully');
}

public function destroy($id)
{
$story = Story::findOrFail($id);

// Delete the associated image file from storage if it exists
if ($story->image) {
Storage::delete('public/' . $story->image);
}

$story->delete();

return redirect()->route('admin.stories.index')->with('success', 'Story deleted successfully');
}
}
