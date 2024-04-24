<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->limit(5)->get();
        return view('admin.testimonials.create', compact('testimonials'));
    }

    public function store(Request $request)
    {
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

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully');
    }

    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'publish_date' => 'required|date_format:Y-m-d',
            'testimonials_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->Content = $validatedData['content'];
        $testimonial->PublishDate = $validatedData['publish_date'];

        if ($request->hasFile('testimonials_image')) {
            $image = $request->file('testimonials_image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/testimonials_images', $imageName);
            Storage::delete('public/' . $testimonial->TestimonialImage);
            $testimonial->TestimonialImage = 'storage/testimonials_images/' . $imageName;
        }

        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->TestimonialImage) {
            Storage::delete('public/' . $testimonial->TestimonialImage);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully');
    }



    public function mindex()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('member.testimonials.index', compact('testimonials'));
    }

    public function mcreate()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->limit(5)->get();
        return view('member.testimonials.create', compact('testimonials'));
    }

    public function mstore(Request $request)
    {
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

        return redirect()->route('member.testimonials.index')->with('success', 'Testimonial created successfully');
    }

    public function mshow($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('member.testimonials.show', compact('testimonial'));
    }

    public function medit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('member.testimonials.edit', compact('testimonial'));
    }

    public function mupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'publish_date' => 'required|date_format:Y-m-d',
            'testimonials_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->Content = $validatedData['content'];
        $testimonial->PublishDate = $validatedData['publish_date'];

        if ($request->hasFile('testimonials_image')) {
            $image = $request->file('testimonials_image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/testimonials_images', $imageName);
            Storage::delete('public/' . $testimonial->TestimonialImage);
            $testimonial->TestimonialImage = 'storage/testimonials_images/' . $imageName;
        }

        $testimonial->save();

        return redirect()->route('member.testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    public function mdestroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->TestimonialImage) {
            Storage::delete('public/' . $testimonial->TestimonialImage);
        }

        $testimonial->delete();

        return redirect()->route('member.testimonials.index')->with('success', 'Testimonial deleted successfully');
    }
}
