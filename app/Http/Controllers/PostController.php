<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        // foreach($posts as $post){
        //     $post->description = Purifier::clean($post->description);
        // }
        return view('admin.page.news.posts', compact('posts'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
            'description' => 'required|string|min:10',
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $imageName = time() . '_' . $image;

        // dd($imageName);
        $path = $request->image->storeAs('images', $imageName, 'public');
        // dd(Auth::user()->id);
        $post = Post::create([
            'title' => request()->get('title'),
            'path' => $path,
            'meta_tag' => request()->get('meta_tag'),
            'meta_keyword' => request()->get('meta_keyword'),
            'status' => request()->get('status'),
            'description' => request()->get('description'),
            'category_id' => request()->get('category'),
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->get('title')),
        ]);

        return redirect()->route('posts.show', $post->slug)->with('success', 'Post created successfully.')->with('image', $path);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->description = Purifier::clean($post->description);
        // $posts = Post::orderBy('created_at','DESC')->get()->take(3);
        $recentPosts = Post::orderBy('created_at', 'DESC')->get()->take(3);


        // $comments = React::where('slug')

        return view('pages.single_news', compact('post', 'recentPosts'));
        // $post = Post::where('slug', $slug)->firstOrFail();
        // $post->description = Purifier::clean($post->description);
        // return view('admin.page.news.showPost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $users = User::where('userType','!=','guest')->get();
        return view('admin.page.news.editPost', compact('post', 'categories','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
            'description' => 'required|string|min:10',
            'user_id' => 'required|exists:users,id',
        ]);
        if ($request->hasFile('image')) {
            if ($post->path) {
                Storage::disk('public')->delete($post->path);
            }
            $image = $request->file('image')->getClientOriginalName();
            $imageName = time() . '_' . $image;

            $path = $request->image->storeAs('images', $imageName, 'public');
            $post->path = $path;
            $post->update($request->only('title', 'category_id','user_id', 'meta_tag', 'meta_keyword','path', 'status', 'description'));
        }else{
            $post->update($request->only('title', 'category_id','user_id', 'meta_tag', 'meta_keyword', 'status', 'description'));
        }
        $post->slug == Str::slug($post->title);
        $post->save();

        return redirect()->route('posts.show', $post->slug)->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully...');
    }
}
