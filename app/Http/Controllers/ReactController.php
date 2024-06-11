<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\React;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactController extends Controller
{
    public function index()
    {
        $comments = React::orderBy('updated_at','DESC')->get();
        // dd($comments);
        return view('admin.page.comment.comment',compact('comments'));
    }

    public function storeComment(Request $request){

        $validate = $request->validate([
            'content' => 'required|string|min:2|max:500',
            'post_id' => 'required|integer|exists:posts,id'
        ]);
        $comment = React::create([
            'content' => $request->get('content'),
            'post_id' => $request->get('post_id'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Comment Posted successfully.');

    }

    public function deleteComment(React $comment){
        // dd($comment);
        $comment->delete();
        return redirect()->back()->with('success','Comment Deleted Successfully.');
    }
}
