<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $videos = Video::orderBy('created_at','DESC')->paginate(15);
        // dd($videos);
        return view('admin.page.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'url' => 'required|url',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:300',
            ]);

        Video::create([
            'title' => request()->get('title'),
            'url' => request()->get('url'),
            'category_id' => request()->get('category'),
            'description' => request()->get('description'),
        ]);

        return redirect()->route('videos.index')->with('success','Video added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('admin.page.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'url' => 'required|url',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:300',
            ]);

        $video->update([
            'title' => request()->get('title'),
            'url' => request()->get('url'),
            'category_id' => request()->get('category'),
            'description' => request()->get('description'),
        ]);

        return redirect()->route('videos.index')->with('success','Video Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->back()->with('success','Video Deleted.');
    }
}
