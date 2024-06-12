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
        $posts = Post::orderBy('created_at', 'DESC')->get()->take(3);
        $categories = Category::where('id', '!=', 1)->orderBy('updated_at', 'ASC')->get();
        $other = Category::find(1);
        $uniquePositions = Advertisement::where('status', true)->distinct()->pluck('position')->toArray();
        // $advertisements = Advertisement::where('status', true)->whereIn('position', $uniquePositions)->inRandomOrder()->get();


        $advertisements = collect();

        foreach ($uniquePositions as $position) {
            $advertisement = Advertisement::where('status', true)
                ->where('position', $position)
                ->inRandomOrder()
                ->first();
            if ($advertisement) {
                $advertisements->push($advertisement);
            }
        }
        // $headerAdvertisements = Advertisement::where('status',true)->where('position','header')->inRandomOrder()->take(1)->get();
        // $sidebarAdvertisements = Advertisement::where('status',true)->where('position','sidebar')->inRandomOrder()->take(3)->get();
        // $footerAdvertisements = Advertisement::where('status',true)->where('position','footer')->inRandomOrder()->take(1)->get();
        // $centerAdvertisements = Advertisement::where('status',true)->where('position','center')->inRandomOrder()->take(3)->get();

        // $user = User::all();
        // dd($advertisements);
        return view('welcome', compact('posts', 'categories', 'other', 'advertisements'));
    }

    public function showNews($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->description = Purifier::clean($post->description);
        // $posts = Post::orderBy('created_at','DESC')->get()->take(3);
        $categories = Category::where('id', '!=', 1)->orderBy('updated_at', 'ASC')->get();
        $other = Category::find(1);

        $recentPosts = Post::orderBy('created_at', 'DESC')->get()->take(3);


        // $comments = React::where('slug')

        return view('pages.single_news', compact('post', 'categories', 'other', 'recentPosts', 'headerAdvertisements'));
    }

}
