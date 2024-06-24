<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::orderBy('created_at', 'DESC')->paginate(15);

        return view('admin.page.advertisement.index', compact('advertisements'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'c_name' => 'required|string|max:255',
            'ad_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'position' => 'required|string',
            'category_id'=>'nullable|integer',
            'url' => 'required|url',
            'expiry_date' => 'required|date|after_or_equal:today',
        ], [
            'expiry_date.after_or_equal' => 'The expiry date must be today or later.',
            // other custom error messages
        ]);
        $category= request()->input('category');
        if ($category == 'NULL')
        {
            $category = null;
        }
        $image = $request->file('ad_image')->getClientOriginalName();
        $imageName = time() . '_' . $image;

        // dd($imageName);
        $ad_path = $request->ad_image->storeAs('He_Images', $imageName, 'public');

        Advertisement::create([
            'name' => request()->get('c_name'),
            'url' => request()->get('url'),
            'position' => request()->get('position'),
            'category_id'=>$category,
            'ad_path' => $ad_path,
            'status' => true,
            'expiry_date' => request()->get('expiry_date'),

        ]);
        return redirect()->route('advertisements.index')->with('success', 'Advertisement created successfully.')->with('image', $ad_path);
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        return view('admin.page.advertisement.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $request->validate([
            'c_name' => 'required|string|max:255',
            'ad_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'position' => 'required|string',
            'category'=>'nullable|integer',
            'url' => 'required|url',
            'expiry_date' => 'required|date|after_or_equal:today',
        ]);
        $category= request()->input('category');
        if ($category == 'NULL')
        {
            $category = null;
        }
        if ($request->hasFile('ad_image')) {
            if ($advertisement->ad_path) {
                Storage::disk('public')->delete($advertisement->ad_path);
            }
            $image = $request->file('ad_image')->getClientOriginalName();
            $imageName = time() . '_' . $image;

            $ad_path = $request->ad_image->storeAs('He_images', $imageName, 'public');
            $advertisement->update([
                'name' => request()->get('c_name'),
                'url' => request()->get('url'),
                'ad_path' => $ad_path,
                'position' => request()->get('position'),
                'category_id'=>$category,
                'status' => true,
                'expiry_date' => request()->get('expiry_date'),
            ]);
        } else {
            $advertisement->update([
                'name' => request()->get('c_name'),
                'url' => request()->get('url'),
                'position' => request()->get('position'),
                'category_id'=>$category,
                'status' => true,
                'expiry_date' => request()->get('expiry_date'),
            ]);
        }
        return redirect()->route('advertisements.index')->with('success', 'Advertisement updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route('advertisements.index')->with('success', 'Advertisement Deleted');
    }

    public function changeStatus(Request $request, $id)
    {
        $advertisement = Advertisement::find($id);

        if ($advertisement && $advertisement->status == true) {
            $advertisement->update(['status' => false]);
            return redirect()->route('advertisements.index')->with('success', 'Advertisement disabled successfully.');
        } else if ($advertisement && $advertisement->status == false) {
            $advertisement->update(['status' => true]);
            return redirect()->route('advertisements.index')->with('success', 'Advertisement enabled successfully.');
        }
        return response("Advertisement may not exist.", Response::HTTP_BAD_REQUEST);
    }
}
