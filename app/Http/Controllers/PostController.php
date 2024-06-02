<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
        $categories = Category::all();
        return view('admin.page.news.cr_post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->file('image'));
        $request->validate([
            'title' => 'required|string|max:255',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
            'description' => 'required|string|min:10',
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $imageName = time() . '_' . $image;

        // dd($imageName);
        $path = $request->image->storeAs('images', $imageName, 'public');

        $post = Post::create([
            'title' => request()->get('title'),
            'path'=> $path,
            'meta_tag' => request()->get('meta_tag'),
            'meta_keyword'=> request()->get('meta_keyword'),
            'status' => request()->get('status'),
            'description'=> request()->get('description'),
            'category_id' => request()->get('category'),
            'slug' => Str::slug($request->get('title')),
        ] );

        return redirect()->route('posts.show', $post->slug)->with('success', 'Post created successfully.')->with('image', $path);;
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('admin.page.news.showPost',compact('post'));
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
