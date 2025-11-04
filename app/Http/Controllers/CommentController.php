<?php

namespace App\Http\Controllers;

use session;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'comment' => 'required|string',
    ]);

    Comment::create([
        'post_id' => $post->id,
        'name' => $request->name,
        'email' => $request->email,
        'content' => $request->comment,
    ]);

    return back()->with('success', 'تم إرسال تعليقك بنجاح، سيتم مراجعته قريباً.');
}


public function react(Request $request, Comment $comment)
{
    $request->validate([
        'reaction' => 'required|in:like,dislike',
    ]);

    $sessionKey = 'reaction_comment_' . $comment->id;
    $previousReaction = session($sessionKey);

    // Undo previous reaction
    if ($previousReaction === $request->reaction) {
        if ($request->reaction === 'like') {
            $comment->decrement('likes_count');
        } else {
            $comment->decrement('dislikes_count');
        }
        session()->forget($sessionKey);
        $status = 'removed';
    } else {
        // Remove old reaction if exists
        if ($previousReaction === 'like') {
            $comment->decrement('likes_count');
        } elseif ($previousReaction === 'dislike') {
            $comment->decrement('dislikes_count');
        }

        // Add new reaction
        if ($request->reaction === 'like') {
            $comment->increment('likes_count');
        } else {
            $comment->increment('dislikes_count');
        }

        session([$sessionKey => $request->reaction]);
        $status = 'added';
    }

    return response()->json([
        'status' => $status,
        'likes' => $comment->likes_count,
        'dislikes' => $comment->dislikes_count,
        'reaction' => session($sessionKey) ?? null,
    ]);
}



}
