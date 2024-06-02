<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.page.news.posts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.news.cr_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 'title','slug','category_id', 'meta_tag','meta_keyword','path','status'
        $request->validate([
            'title' => 'required|string|max:255',
            'path' =>'',
            'status' => 'required|boolean|',
            'description' => 'required|string|min:10',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::create([
            'title' => request()->get('title'),
            'path'=> request()->get('path'),
            'status' => request()->get('status'),
            'description'=> request()->get('description'),
            'category_id' => request()->get('category_id'),
            'slug' => Str::slug($request->get('title')),
        ] );

        return redirect()->route('posts.show', $post->slug)->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
