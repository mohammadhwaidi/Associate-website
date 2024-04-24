<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SlideShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SlideShowController extends Controller
{
    public function index()
    {
        $slideshows = SlideShow::orderBy('created_at', 'desc')->get();
        return view('admin.slideshows.index', compact('slideshows'));
    }

    public function create()
    {
        return view('admin.slideshows.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'caption' => 'required',
            'slideshow_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('slideshow_image');
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/slideshow_images', $imageName);

        $slideshow = SlideShow::create([
            'Title' => $validatedData['title'],
            'Caption' => $validatedData['caption'],
            'AdminID' => Auth::id(),
            'SlideshowImage' => 'storage/slideshow_images/' . $imageName,
        ]);

        return redirect()->route('admin.slideshows.index')->with('success', 'SlideShow created successfully');
    }

    public function show($id)
    {
        $slideshow = SlideShow::findOrFail($id);
        return view('admin.slideshows.show', compact('slideshow'));
    }

    public function edit($id)
    {
        $slideshow = SlideShow::findOrFail($id);
        return view('admin.slideshows.edit', compact('slideshow'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'caption' => 'required',
            'slideshow_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slideshow = SlideShow::findOrFail($id);
        $slideshow->Title = $validatedData['title'];
        $slideshow->Caption = $validatedData['caption'];

        if ($request->hasFile('slideshow_image')) {
            $image = $request->file('slideshow_image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/slideshow_images', $imageName);
            Storage::delete('public/' . $slideshow->SlideshowImage);
            $slideshow->SlideshowImage = 'storage/slideshow_images/' . $imageName;
        }

        $slideshow->save();

        return redirect()->route('admin.slideshows.index')->with('success', 'SlideShow updated successfully');
    }

    public function destroy($id)
    {
        $slideshow = SlideShow::findOrFail($id);

        if ($slideshow->SlideshowImage) {
            Storage::delete('public/' . $slideshow->SlideshowImage);
        }

        $slideshow->delete();

        return redirect()->route('admin.slideshows.index')->with('success', 'SlideShow deleted successfully');
    }



    public function mindex()
    {
        $slideshows = SlideShow::orderBy('created_at', 'desc')->get();
        return view('member.slideshows.index', compact('slideshows'));
    }

    public function mcreate()
    {
        return view('member.slideshows.create');
    }

    public function mstore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'caption' => 'required',
            'slideshow_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('slideshow_image');
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/slideshow_images', $imageName);

        $slideshow = SlideShow::create([
            'Title' => $validatedData['title'],
            'Caption' => $validatedData['caption'],
            'AdminID' => Auth::id(),
            'SlideshowImage' => 'storage/slideshow_images/' . $imageName,
        ]);

        return redirect()->route('member.slideshows.index')->with('success', 'SlideShow created successfully');
    }

    public function mshow($id)
    {
        $slideshow = SlideShow::findOrFail($id);
        return view('member.slideshows.show', compact('slideshow'));
    }

    public function medit($id)
    {
        $slideshow = SlideShow::findOrFail($id);
        return view('member.slideshows.edit', compact('slideshow'));
    }

    public function mupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'caption' => 'required',
            'slideshow_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slideshow = SlideShow::findOrFail($id);
        $slideshow->Title = $validatedData['title'];
        $slideshow->Caption = $validatedData['caption'];

        if ($request->hasFile('slideshow_image')) {
            $image = $request->file('slideshow_image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/slideshow_images', $imageName);
            Storage::delete('public/' . $slideshow->SlideshowImage);
            $slideshow->SlideshowImage = 'storage/slideshow_images/' . $imageName;
        }

        $slideshow->save();

        return redirect()->route('member.slideshows.index')->with('success', 'SlideShow updated successfully');
    }

    public function mdestroy($id)
    {
        $slideshow = SlideShow::findOrFail($id);

        if ($slideshow->SlideshowImage) {
            Storage::delete('public/' . $slideshow->SlideshowImage);
        }

        $slideshow->delete();

        return redirect()->route('member.slideshows.index')->with('success', 'SlideShow deleted successfully');
    }
}
