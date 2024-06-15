<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Post;
use App\Models\React;
use App\Models\User;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;


class NewsPageController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get()->take(8);
        return view('welcome', compact('posts'));
    }

    public function showNews($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->description = Purifier::clean($post->description);
        // $posts = Post::orderBy('created_at','DESC')->get()->take(3);
        $categories = Category::where('id', '!=', 1)->orderBy('updated_at', 'ASC')->get();
        $other = Category::find(1);

        $recentPosts = Post::orderBy('created_at', 'DESC')->get()->take(5);


        // $comments = React::where('slug')

        return view('pages.single_news', compact('post', 'categories', 'other', 'recentPosts',));
    }

}
