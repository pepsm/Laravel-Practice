<?php

namespace bbook\Http\Controllers;

use Illuminate\Http\Request;
use bbook\Comment;
class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
        if(auth()->user() != null){
            $comment = new Comment;
            $comment->body = $request->input('body');
            $comment->item_id = $request->input('item_id');
            $comment->user_id = auth()->user()->id;
            $comment->save();
        }
        return back();
    }
}
