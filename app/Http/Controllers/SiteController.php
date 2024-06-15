<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        if (Auth::user()->isAdmin()) {
            return view('admin.page.others.site_info',compact('site'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
        if (Auth::user()->isAdmin()) {
            $site = Site::find(1);

        $request->validate([
            'siteName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255',
            'phone' => 'required|string|min:9|max:14',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'thread' => 'nullable|url',
            'metaTitle' => 'nullable|string|max:255',
            'metaTag' => 'nullable|string|max:255',
            'metaKeyword' => 'nullable|string|max:255',
            'metaDescription' => 'nullable|string|max:300',
        ]);
            $site->update($request->only('siteName', 'address', 'email','phone','facebook','instagram','twitter','youtube','thread','metaTitle','metaTag', 'metaKeyword', 'metaDescription'));

        $site->save();

        return redirect()->route('site.show',1)->with('success', 'Site info updated successfully.');
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        //
    }
}
