<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Comment;
class apiCommentController extends Controller
{


    public function index(Request $filter)
    {

        $filter->post ?
            $comments = Comment::where('post_id', $filter->post)->get()
            :
            $comments = Comment::with('post')->paginate(5);
        return response()->json($comments);
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (!Gate::allows('delete-comment', $comment)) {
            return response()->json(['error' => 'unauthorization 403']);

        } else {
            $comment->delete();
            return 'DELETE comment ';
        }

    }
}