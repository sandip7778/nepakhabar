<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\tranding_post_show;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
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
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
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
        $trendingMax = tranding_post_show::value('count_tranding');
        $trendingCount = (int) $trendingMax;

        // dd($trendingCount);
        return view('admin.page.news.cr_post', compact('categories','trendingCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|string|max:255',
                'sub_title' => 'nullable|string|max:400',
                'context' => 'nullable|string|max:255',
                'category' => 'required|exists:categories,id',
                'meta_tag' => 'nullable|max:255',
                'meta_keyword' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'youtube' => ['nullable', 'url', 'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})$/'],
                'image_desc' => 'nullable|string|max:400',
                'trending_status' => ['required','integer','min:0'],
                'status' => 'required|boolean',
                'description' => 'required|string|min:10',
            ],
            [
                'youtube.regex' => 'Must be a valid youtube link. Eg.https://www.youtube.com/watch?v=Cb6wuzOurPc'
            ]
        );

        if($request->get('trending_status') != 0){
            $request->validate(['trending_status' => 'unique:posts,trending_status,0']);
        }
        if (!$request->hasFile('image') && !$request->filled('youtube')) {
            return redirect()->back()->withErrors(['image' => 'Either an image or YouTube link is required.'])->withInput();
        } elseif ($request->hasFile('image') && $request->filled('youtube')) {
            return redirect()->back()->withErrors(['image' => 'Only image or Youtube link can be posted'])->withInput();
        }
        $path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $imageName = time() . '_' . str_replace(' ', '_', $image);
            $path = $request->image->storeAs('images', $imageName, 'public');
        }
        $post = Post::create([
            'title' => request()->get('title'),
            'sub_title' => request()->get('sub_title'),
            'context' => request()->get('context'),
            'category_id' => request()->get('category'),
            'meta_tag' => request()->get('meta_tag'),
            'meta_keyword' => request()->get('meta_keyword'),
            'path' => $path,
            'youtube' => request()->get('youtube'),
            'image_desc' => request()->get('image_desc'),
            'trending_status' => request()->get('trending_status'),
            'status' => request()->get('status'),
            'description' => request()->get('description'),
            'user_id' => Auth::user()->id,
        ]);
        $post->slug = $post->id . '-' . Str::slug($post->title);
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post created successfully.')->with('image', $path);

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('status', true)->firstOrFail();
        $description = $post->description;
        $textAds = Advertisement::where('position','betweenText')->where('status',true)->inRandomOrder()->get();

        $advertisementView = view('pages.shared.advertisement_within_text',compact('textAds'))->render();

        $modified_description = str_replace('{Advertisement}', $advertisementView, $description);

        $singlePageAdvertisements = Advertisement::where('status', true)->inRandomOrder()->get();
        $recentPosts = Post::orderBy('created_at', 'DESC')->get()->take(5);
        $post->increment('views');

        return view('pages.single_news', compact('post', 'recentPosts','textAds','modified_description','advertisementView','singlePageAdvertisements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $trendingMax = tranding_post_show::value('count_tranding');
        $trendingCount = (int) $trendingMax;
        $users = User::where('userType', '!=', 'guest')->get();
        return view('admin.page.news.editPost', compact('post', 'categories', 'users', 'trendingCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // dd($request->id);
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'sub_title' => 'nullable|string|max:400',
                'context' => 'nullable|string|max:255',
                'category' => 'required|exists:categories,id',
                'meta_tag' => 'nullable|max:255',
                'meta_keyword' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'youtube' => ['nullable', 'url', 'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})$/'],
                'image_desc' => 'nullable|string|max:400',
                'trending_status' => ['required','numeric','min:0'],
                'description' => 'required|string|min:10',
                'user_id' => 'required|exists:users,id',
            ],
            [
                'youtube.regex' => 'Must be a valid youtube link. Eg.https://www.youtube.com/watch?v=Cb6wuzOurPc'
            ]
        );

        if($request->get('trending_status') != 0){
            $request->validate(['trending_status' => Rule::unique('posts')->ignore($post->id)]);
        }

        if ($request->hasFile('image') && $request->filled('youtube')) {
            return redirect()->back()->withErrors(['image' => 'Only image or Youtube link can be posted'])->withInput();
        }
        $path = null;
        if ($request->hasFile('image')) {
            if ($post->path) {
                Storage::disk('public')->delete($post->path);
            }
            $image = $request->file('image')->getClientOriginalName();
            $imageName = time() . '_' . str_replace(' ', '_', $image);
            $path = $request->image->storeAs('images', $imageName, 'public');
            $post->path = $path;
            $post->update($request->only('title','sub_title','context', 'category_id', 'user_id', 'meta_tag', 'meta_keyword', 'path','image_desc','trending_status', 'description'));
        } elseif ($request->filled('youtube')) {
            if ($post->path) {
                Storage::disk('public')->delete($post->path);
            }
            $post->path = $path;
            $post->update($request->only('title','sub_title','context', 'category_id', 'user_id', 'meta_tag', 'meta_keyword', 'path', 'youtube', 'image_desc', 'trending_status', 'description'));
        } else {
            $post->update($request->only('title','sub_title','context', 'category_id', 'user_id', 'meta_tag', 'meta_keyword', 'image_desc', 'trending_status', 'description'));

        }
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

    public function trendingPosts()
    {
        $posts = Post::where('trending_status','!=',0)->orderBy('trending_status','ASC')->paginate(10);
        return view('admin.page.news.trendingPosts', compact('posts'));
    }

    public function changeStatus(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
            $post->update(['trending_status' => 0]);
            // dd($post->status);
            return redirect()->back()->with('success', 'Post removed from trending.');
    }

    public function changeTrendingStatus(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        // dd($user -> status);
        if ($post && $post->trending_status == true) {
            $post->update(['trending_status' => false]);
            // dd($post->status);
            return redirect()->back()->with('success', 'Post removed from trending.');
        } else if ($post && $post->trending_status == false) {
            $post->update(['trending_status' => true]);
            return redirect()->back()->with('success', 'Post shown to trending.');
        }
        return response("Post may not exist.");
    }
}
