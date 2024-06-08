<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC');
        if(request()->has('search')){
            $posts = $posts->where('title','like','%'.request()->get('search').'%');
        }
           $posts = $posts->paginate(5);
        // dd($posts);
        return view('admin.home', compact('posts'));
    }

    public function site_info()
    {
        return view('admin.page.others.site_info');
    } 
}
