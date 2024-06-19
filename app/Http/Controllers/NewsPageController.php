<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;


class NewsPageController extends Controller
{
    public function index()
    {
        $threeDay = Carbon::now()->subDays(3);

        $posts = Post::where('created_at','>=',$threeDay)->inRandomOrder()->limit(6)->get();
        $videos = Video::inRandomOrder()->limit(5)->get();
        $recentArticles = Post::orderBy('updated_at', 'DESC')->get()->take(6);
        $HomeTranding = Post::orderBy('updated_at', 'DESC')->get()->take(3);

        foreach ($videos as $video)
        {
            $video->description = Purifier::clean($video->description);
        }

        // $video_ids = [];
        // foreach ($videos as $video) {
        //     // Extract the video ID from the YouTube URL
        //     preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video->url, $matches);
        //     if (isset($matches[1])) {
        //         $video_ids[] = $matches[1];
        //     }
        // }

        return view('welcome', compact('posts','videos','recentArticles','HomeTranding'));
    }

    public function share(Request $request, Post $post, $network)
    {
        // Update shares count
        $post->increment('share');

        // Depending on the network, redirect to the appropriate share URL
        switch ($network) {
            case 'facebook':
                return redirect()->away('https://www.facebook.com/sharer/sharer.php?u='.urlencode(route('posts.show', $post->slug)).'&quote='.urlencode($post->title));
            case 'twitter':
                return redirect()->away('https://twitter.com/intent/tweet?url='.urlencode(route('posts.show', $post->slug)).'&text='.urlencode($post->title));
            case 'whatsapp':
                return redirect()->away('whatsapp://send?text='.urlencode($post->title . ' ' . route('posts.show', $post->slug)));
            case 'linkedin':
                return redirect()->away('https://www.linkedin.com/shareArticle?url='.urlencode(route('posts.show', $post->slug)).'&text='.urlencode($post->title));
            default:
                abort(404);
        }
    }

}
