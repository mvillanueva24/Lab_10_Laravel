<?php

namespace App\Http\Controllers;

use App\Notifications\CommentNotification;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required:max:250',
        ]);

        $comment = new Comment();
        $comment->user_id = $request->user()->id;
        $comment->content = $request->get('content');

        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        $user_post_id = $post->user_id;
        $title = $post->title;
        //auth()->user()->notify(new CommentNotification($comment, $user_post_id, $title));
        
        User::find($user_post_id)
            ->notify(new CommentNotification($comment, $title));


        return redirect()->route('post', ['id' => $request->get('post_id')]);
    }
}
