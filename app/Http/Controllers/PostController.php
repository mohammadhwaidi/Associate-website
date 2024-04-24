<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'publish_date' => 'required|date_format:Y-m-d',
            'posts_images.*' => 'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif,video/mp4,video/quicktime,video/x-msvideo|max:20480000',
        ]);


        $post = new Post([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'publish_date' => $validatedData['publish_date'],
            'admin_id' => Auth::id(),
        ]);
        $post->save();

        if ($request->hasFile('posts_images')) {
            foreach ($request->file('posts_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);

                $postImage = new PostImage(['image_path' => 'storage/images/' . $imageName]);
                $post->images()->save($postImage);
            }
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'publish_date' => 'required|date_format:Y-m-d',
            'posts_images.*' => 'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif,video/mp4,video/quicktime,video/x-msvideo|max:20480000',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->publish_date = $validatedData['publish_date'];
        $post->save();

        if ($request->hasFile('posts_images')) {
            foreach ($request->file('posts_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);

                $postImage = new PostImage(['image_path' => 'storage/images/' . $imageName]);
                $post->images()->save($postImage);
            }
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->images()->exists()) {
            foreach ($post->images as $image) {
                Storage::delete($image->image_path);
                $image->delete();
            }
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully');
    }










    public function mindex()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('member.posts.index', compact('posts'));
    }

    public function mcreate()
    {
        return view('member.posts.create');
    }

    public function mstore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'publish_date' => 'required|date_format:Y-m-d',
            'posts_images.*' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,video/mp4,video/quicktime,video/x-msvideo|max:20480000',
        ]);

        $post = new Post([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'publish_date' => $validatedData['publish_date'],
            'admin_id' => Auth::id(),
        ]);
        $post->save();

        if ($request->hasFile('posts_images')) {
            foreach ($request->file('posts_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);

                $postImage = new PostImage(['image_path' => 'storage/images/' . $imageName]);
                $post->images()->save($postImage);
            }
        }

        return redirect()->route('member.posts.index')->with('success', 'Post created successfully');
    }

    public function mshow($id)
    {
        $post = Post::findOrFail($id);
        return view('member.posts.show', compact('post'));
    }

    public function medit($id)
    {
        $post = Post::findOrFail($id);
        return view('member.posts.edit', compact('post'));
    }

    public function mupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'publish_date' => 'required|date_format:Y-m-d',
            'posts_images.*' => 'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif,video/mp4,video/quicktime,video/x-msvideo|max:20480000',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->publish_date = $validatedData['publish_date'];
        $post->save();

        if ($request->hasFile('posts_images')) {
            foreach ($request->file('posts_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);

                $postImage = new PostImage(['image_path' => 'storage/images/' . $imageName]);
                $post->images()->save($postImage);
            }
        }

        return redirect()->route('member.posts.index')->with('success', 'Post updated successfully');
    }

    public function mdestroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->images()->exists()) {
            foreach ($post->images as $image) {
                Storage::delete($image->image_path);
                $image->delete();
            }
        }

        $post->delete();

        return redirect()->route('member.posts.index')->with('success', 'Post deleted successfully');
    }
}
