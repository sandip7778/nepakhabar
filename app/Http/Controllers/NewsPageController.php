<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use App\Models\tranding_post_show;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;


class NewsPageController extends Controller
{
    public function index()
    {
        $threeDay = Carbon::now()->subDays(5);
        $sevenDay = Carbon::now()->subDays(7);
        $tpsc = tranding_post_show::find(1);
        $tpostcount = $tpsc->count_tranding;

        if (request()->has('search') && request()->get('search') != '') {
            $posts = Post::orderBy('created_at', 'DESC');
            $posts = $posts->orwhere('title', 'like', '%' . request()->get('search') . '%')
                            ->orWhere('description', 'like', '%' . request()->get('search') . '%')
                            ->paginate(8);
        }else{
            $posts = Post::where('status',true)->where('trending_status','!=',0)->orderBy('trending_status','ASC')->limit($tpostcount)->get();
        }
        $videos = Video::inRandomOrder()->limit(5)->get();
        $recentArticles = Post::where('status',true)->orderBy('updated_at', 'DESC')->get()->take(10);
        $trendings = Post::where('created_at','>=',$threeDay)->where('status',true)->orderBy('created_at','DESC')->limit(7)->get();
        $weeklyTopPosts = Post::where('created_at','>=',$sevenDay)->where('status',true)->orderBy('created_at','DESC')->limit(15)->get();

        foreach ($videos as $video)
        {
            $video->description = Purifier::clean($video->description);
        }

        return view('welcome', compact('posts','videos','trendings','weeklyTopPosts','recentArticles'));
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

    public function team(){
        $teams = User::where('userType','!=','guest')->get();
        return view('pages.team_m',compact('teams'));
    }

    public function contactUs(){
        $sevenDay = Carbon::now()->subDays(7);
        $posts = Post::where('created_at','<=',$sevenDay)->orderBy('views','DESC')->take(15);
        return view('pages.contact', compact('posts'));
    }
}
