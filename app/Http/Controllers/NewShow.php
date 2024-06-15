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
        $CPosts = Post::where('category_id', $id)->get();
        return view('pages.category',compact('CPosts'));
    }

    public function TeamMemeber(){

        return view('pages.team_m');
    }
    public function Contactus(){
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return view('pages.contact', compact('posts'));
    }
}
