<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('updated_at', 'desc')->paginate(10);
        $posts = Post::all();
        return view('admin.page.news_category.category' , compact('categories'));
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
        $validate = $request->validate([
            'name'=> 'required|string|unique:categories,name|min:2|max:255',
        ]);

        $category = Category::create($validate);

        return redirect()->route('categories.index')->with('success','Category Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // dd($category);
        $threeDay = Carbon::now()->subDays(3);
        $posts = Post::where('category_id', $id)->paginate(20);
        foreach($posts as $post)
        {
            $post->description = Purifier::clean($post->description);
        }
        $trendings = Post::where('updated_at','>=',$threeDay)->inRandomOrder()->limit(3)->get();
        return view('pages.category', compact('posts','trendings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.page.news_category.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validate = $request->validate([
            'name'=> 'required|string|unique:categories,name|min:2|max:255',
        ]);

        $category->update($validate);

        return redirect()->route('categories.index')->with('success','Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category Deleted Successfully.');
    }
}
