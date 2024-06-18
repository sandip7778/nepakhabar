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
use Pratiksh\Nepalidate\Facades\NepaliDate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
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

        $request->validate([
            'title' => 'required|unique:posts,title|string|max:255',
            'category' => 'required|exists:categories,id',
            'meta_tag' => 'nullable|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'youtube' => 'nullable|url',
            'status' => 'required|boolean',
            'description' => 'required|string|min:10',
        ]);
        if (!$request->hasFile('image') && !$request->filled('youtube')) {
            return redirect()->back()->withErrors(['image' => 'Either an image or YouTube link is required.'])->withInput();
        }elseif($request->hasFile('image') && $request->filled('youtube')){
            return redirect()->back()->withErrors(['image' => 'Only image or Youtube link can be posted'])->withInput();
        }
        $path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $imageName = time() . '_' . str_replace(' ', '_', $image);
            $path = $request->image->storeAs('images', $imageName, 'public');
        }
         Post::create([
            'title' => request()->get('title'),
            'category_id' => request()->get('category'),
            'meta_tag' => request()->get('meta_tag'),
            'meta_keyword' => request()->get('meta_keyword'),
            'path' => $path,
            'youtube' => request()->get('youtube'),
            'status' => request()->get('status'),
            'description' => request()->get('description'),
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->get('title')),
        ]);
        return redirect()->route('posts.index')->with('success', 'Post created successfully.')->with('image', $path);

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('status', true)->firstOrFail();
        $post->description = Purifier::clean($post->description);
        // $posts = Post::orderBy('created_at','DESC')->get()->take(3);
        $recentPosts = Post::orderBy('created_at', 'DESC')->get()->take(3);
        $post->increment('views');

        return view('pages.single_news', compact('post', 'recentPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $users = User::where('userType', '!=', 'guest')->get();
        return view('admin.page.news.editPost', compact('post', 'categories', 'users'));
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
            $post->update($request->only('title', 'category_id', 'user_id', 'meta_tag', 'meta_keyword', 'path', 'description'));
        } else {
            $post->update($request->only('title', 'category_id', 'user_id', 'meta_tag', 'meta_keyword', 'description'));
        }
        $post->slug == Str::slug($post->title);
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
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

    public function changeStatus(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        // dd($user -> status);
        if ($post && $post->status == true) {
            $post->update(['status' => false]);
            // dd($post->status);
            return redirect()->route('posts.index')->with('success', 'Post disabled successfully.');
        } else if ($post && $post->status == false) {
            $post->update(['status' => true]);
            return redirect()->route('posts.index')->with('success', 'Post enabled successfully.');
        }
        return response("Post may not exist.");
    }

    public function changeTrendingStatus(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        // dd($user -> status);
        if ($post && $post->trending_status == true) {
            $post->update(['trending_status' => false]);
            // dd($post->status);
            return redirect()->route('posts.index')->with('success', 'Post removed from trending.');
        } else if ($post && $post->trending_status == false) {
            $post->update(['trending_status' => true]);
            return redirect()->route('posts.index')->with('success', 'Post shown to trending.');
        }
        return response("Post may not exist.");
    }
}
