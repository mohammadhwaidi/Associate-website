<?php
namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
/**
* Display a listing of the resource.
*/
public function index()
{
$contactMessages = ContactUs::orderBy('ContactUsID', 'desc')->get();
return view('admin.contact.index', compact('contactMessages'));
}

/**
* Show the form for creating a new resource.
*/
public function create()
{
return view('admin.contact.create');
}

/**
* Store a newly created resource in storage.
*/
public function store(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to submit the form.');
    }

    $validatedData = $request->validate([
'Name' => 'required',
'Email' => 'required|email',
'PhoneNumber' => 'nullable|string|max:20',
'Message' => 'required',
]);

ContactUs::create($validatedData);

return back()->with('success', 'Your message was sent, thank you!');
}

/**
* Display the specified resource.
*/
public function show($id)
{
$message = ContactUs::findOrFail($id);
return view('admin.contact.show', compact('message'));
}

/**
* Show the form for editing the specified resource.
*/
public function edit($id)
{
$message = ContactUs::findOrFail($id);
return view('admin.contact.edit', compact('message'));
}

/**
* Update the specified resource in storage.
*/
public function update(Request $request, $id)
{
$validatedData = $request->validate([
'Name' => 'required',
'Email' => 'required|email',
'PhoneNumber' => 'nullable|string|max:20',
'Message' => 'required',
]);

$message = ContactUs::findOrFail($id);
$message->update($validatedData);

return redirect()->route('admin.contact.index')->with('success', 'Message updated successfully!');
}

/**
* Remove the specified resource from storage.
*/
public function destroy($id)
{
$message = ContactUs::findOrFail($id);
$message->delete();

return redirect()->route('admin.contact.index')->with('success', 'Message deleted successfully!');
}
}
