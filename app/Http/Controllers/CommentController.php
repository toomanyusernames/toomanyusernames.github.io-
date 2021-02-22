<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CommentController extends Controller
{
    public function index(Request $request){
        $this->validate($request, [
            'post_id' => 'exists:posts,id|numeric',
            'comment' => 'required|max:255'
        ]);
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();

        Session::flash('success', 'Your comment was successfully added');
        return redirect()->back();
    }
}
