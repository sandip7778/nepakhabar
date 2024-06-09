<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $taPost = Post::where('status', true)->count();
        $tdPost = Post::where('status', false)->count();

        $taAdvertisement = Advertisement::where('status', true)->count();
        $tdAdvertisement = Advertisement::where('status', false)->count();
        $totalCategory = Category::count();

        $posts = Post::orderBy('created_at','DESC');
        if(request()->has('search')){
            $posts = $posts->where('title','like','%'.request()->get('search').'%');
        }
           $posts = $posts->take(5)->get();


        $advertisements = Advertisement::where('status',true)->orderBy('updated_at','DESC')->take(3)->get();
        return view('admin.home', compact('posts','advertisements','taPost','tdPost','taAdvertisement','tdAdvertisement','totalCategory'));
    }

    public function site_info()
    {
        return view('admin.page.others.site_info');
    }
}
