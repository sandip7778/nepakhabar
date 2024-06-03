<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewShow extends Controller
{
    public function NewShow(){

        return view('pages.news');
    }

    public function Categories(){

        return view('pages.category');
    }


    public function SingleNews(String $id){

        return view('pages.single_news', ['id'=> $id]);
    }
}
