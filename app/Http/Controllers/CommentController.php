<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
  // public function index()
  // {
  //   $comments = Comment::all();
  //   return view('comment.index', ['comments' => $comments]);
  // }

  public function store(Request $request)
  {

    $request->validate(['description' => 'required']);
    $comment = new Comment();
    $comment->description = $request->description;
    $comment->post_id = $request->post_id;
    $comment->save();
    return redirect()->back();
  }

}