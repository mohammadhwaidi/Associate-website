<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        if (!Auth::check()) {
            $request->session()->put('comment_data', $request->all());
            return redirect()->route('login')->with('error', 'Please log in to submit the form.');
        }
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment([
            'content' => $validatedData['content'],
            'user_id' => Auth::id(), // Assuming comments are associated with users
        ]);

        $post->comments()->save($comment);

        // Redirect back to the previous page
        return redirect()->back()->with('success', 'Comment added successfully');
    }
    public function edit($postId, $commentId)
    {
        $post = Post::findOrFail($postId);
        $comment = Comment::findOrFail($commentId);

        return view('comments.edit', compact('post', 'comment'));
    }

    public function update(Request $request, $postId, $commentId)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $comment = Comment::findOrFail($commentId);
        $comment->content = $validatedData['content'];
        $comment->save();

        return redirect()->route('posts.show', ['id' => $postId])->with('success', 'Comment updated successfully');
    }

    public function destroy($postId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return redirect()->route('posts.show', ['id' => $postId])->with('success', 'Comment deleted successfully');
    }
}
