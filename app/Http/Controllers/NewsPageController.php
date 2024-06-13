<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;


class NewsPageController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get()->take(3);
        $videos = Video::inRandomOrder()->limit(5)->get();

        $video_ids = [];
        foreach ($videos as $video) {
            // Extract the video ID from the YouTube URL
            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video->url, $matches);
            if (isset($matches[1])) {
                $video_ids[] = $matches[1];
            }
        }

        return view('welcome', compact('posts','video_ids','videos'));
    }

    public function showNews($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->description = Purifier::clean($post->description);
        // $posts = Post::orderBy('created_at','DESC')->get()->take(3);
        $recentPosts = Post::orderBy('created_at', 'DESC')->get()->take(3);


        // $comments = React::where('slug')

        return view('pages.single_news', compact('post', 'recentPosts'));
    }

}
