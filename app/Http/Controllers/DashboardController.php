<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.home');
    } 

    public function site_info()
    {
        return view('admin.page.others.site_info');
    } 
}
