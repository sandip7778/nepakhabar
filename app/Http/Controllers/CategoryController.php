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
        $categories = Category::orderBy('position', 'asc')->paginate(10);
        $posts = Post::all();
        return view('admin.page.news_category.category', compact('categories'));
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
            'name' => 'required|string|unique:categories,name|min:2|max:255',
            'footer_status' => 'required|boolean',
            'header_status' => 'required|boolean',
            'position' => 'unique:categories,position',
            'block' => 'required'
        ]);

        // $category = Category::create($validate);
        $block = $request->input('block');
        if ($block == 'hide') {
            $block = null;
        }
        $position = $request->input('position');
        if ($position == 'NULL') {
            $position = null;
        }

        Category::create([
            'name' => request()->get('name'),
            'footer_status' => request()->get('footer_status'),
            'header_status' => request()->get('header_status'),
            'position' => $position,
            'block' => $block,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // dd($category);
        $threeDay = Carbon::now()->subDays(3);
        // $posts = Post::where('category_id', $id)->orderBy('updated_at', 'DESC')->paginate(20);
        // foreach ($posts as $post) {
        //     $post->description = Purifier::clean($post->description);
        // }
        $posts = $category->posts()->orderBy('updated_at', 'DESC')->paginate(25);
        $trendings = Post::where('updated_at', '>=', $threeDay)->inRandomOrder()->limit(3)->get();
        return view('pages.category', compact('category', 'trendings', 'posts'));
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
            'name' => 'required|string|min:2|max:255',
            'footer_status' => 'required|boolean',
            'header_status' => 'required|boolean',
            'block' => 'required'

        ]);
        // dd($request);
        $block = $request->input('block');
        if ($block == 'hide') {
            $block = null;
        }
        $position = $request->input('position');
        if ($position == 'NULL') {
            $position = null;
        }
        // dd(intval($position));
        if ($category->position == intval($position)) {
            $category->update([
                'name' => request()->get('name'),
                'footer_status' => request()->get('footer_status'),
                'header_status' => request()->get('header_status'),
                'block' => $block,
            ]);
        } else {
            $request->validate([
                'position' => 'unique:categories,position',
            ]);
            $category->update([
                'name' => request()->get('name'),
                'footer_status' => request()->get('footer_status'),
                'header_status' => request()->get('header_status'),
                'position' => $position,
                'block' => $block,
            ]);

        }
        // dd($category);


        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category Deleted Successfully.');
    }
}
