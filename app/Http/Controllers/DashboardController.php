<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $taPost = Post::where('status', true)->count();
        $tdPost = Post::where('status', false)->count();

        if (Auth::user()->isAdmin()) {
            $taMember = User::where('status', true)->where('userType', '!=', 'guest')->count();
            $tdMember = User::where('status', false)->where('userType', '!=', 'guest')->count();

            $taGuest = User::where('status', true)->where('userType', 'guest')->count();
            $tdGuest = User::where('status', false)->where('userType', 'guest')->count();
        }
        $taAdvertisement = Advertisement::where('status', true)->count();
        $tdAdvertisement = Advertisement::where('status', false)->count();

        $totalCategory = Category::count();

        $posts = Post::orderBy('created_at', 'DESC');
        if (request()->has('search')) {
            $posts = $posts->where('title', 'like', '%' . request()->get('search') . '%');
        }
        $posts = $posts->take(5)->get();


        $advertisements = Advertisement::where('status', true)->orderBy('updated_at', 'DESC')->take(3)->get();
        if (Auth::user()->isAdmin()) {
            return view('admin.home', compact('posts', 'advertisements', 'taMember', 'tdMember', 'taGuest', 'tdGuest', 'taPost', 'tdPost', 'taAdvertisement', 'tdAdvertisement', 'totalCategory'));
        } else {
            return view('admin.home', compact('posts', 'advertisements', 'taPost', 'tdPost', 'taAdvertisement', 'tdAdvertisement', 'totalCategory'));
        }
    }

}
