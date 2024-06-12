<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $comments = Comment::orderBy('updated_at','DESC')->get();
        // // dd($comments);
        // return view('admin.page.comment.comment',compact('comments'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'content' => 'required|string|min:2|max:500',
            'post_id' => 'required|integer|exists:posts,id',
            'parent_id' => 'nullable|integer|exists:comments,id',
        ]);
        $comment = Comment::create([
            'content' => $request->get('content'),
            'post_id' => $request->get('post_id'),
            'user_id' => Auth::user()->id,
            'parent_id' => $request->get('parent_id')
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $comments = Comment::orderBy('updated_at','DESC')->get();
        // dd($comments);
        return view('admin.page.comment.comment',compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        // dd($comment);
        $comment->delete();
        return redirect()->back()->with('success','Comment Deleted Successfully.');
    }

    public function comments(){
        $comments = Comment::orderBy('updated_at','DESC')->get();
        // dd($comments);
        return view('admin.page.comment.comment',compact('comments'));
    }
}
