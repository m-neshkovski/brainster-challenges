<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentPostRequest;
use App\Models\Comment;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(CommentPostRequest $request, $theme_id) {
        // dd($request);
        $comment = Comment::make();
        $comment->comment = $request->comment;
        $comment->save();

        User::find(Auth::user()->id)
            ->comments()
            ->attach($comment->id, [
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        
        Theme::find($theme_id)
            ->comments()
            ->attach($comment->id, [
                'created_at' => now(),
                'updated_at' => now(),
        ]);

        return redirect()->back()->with('status', 'Comment added');
    }
}
