<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class NewShow extends Controller
{
    public function indexN(){
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return view('welcome', compact('posts'));
    }

    public function NewShow(){

        return view('pages.news');
    }

    public function Categories(String $id){

        return view('pages.category');
    }

    public function SingleNews(String $id){
        $post = Post::where('slug', $id)->firstOrFail();
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.single_news',compact('post','categories','posts'));
    }

    public function TeamMemeber(){

        return view('pages.team_m');
    }
}
