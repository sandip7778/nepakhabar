<?php

namespace App\Http\Controllers;

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
        $advertisements = Advertisement::orderBy('created_at', 'DESC');
        foreach ($advertisements as $advertisement) {
            $advertisement->description = Purifier::clean($advertisement->description);
        }
        $advertisements = $advertisements->paginate(15);
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
            'ad_description' => 'required|string|min:10',
        ]);

        $image = $request->file('ad_image')->getClientOriginalName();
        $imageName = time() . '_' . $image;

        // dd($imageName);
        $ad_path = $request->ad_image->storeAs('He_Images', $imageName, 'public');

        Advertisement::create([
            'name' => request()->get('c_name'),
            'description' => request()->get('ad_description'),
            'position' => request()->get('position'),
            'ad_path' => $ad_path,
            'status' => true,

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
            'ad_description' => 'required|string|min:10',
        ]);
        if ($request->hasFile('ad_image')) {
            if ($advertisement->ad_path) {
                Storage::disk('public')->delete($advertisement->ad_path);
            }
            $image = $request->file('ad_image')->getClientOriginalName();
            $imageName = time() . '_' . $image;

            $ad_path = $request->ad_image->storeAs('He_images', $imageName, 'public');
            $advertisement->update([
                'name' => request()->get('c_name'),
                'description' => request()->get('ad_description'),
                'ad_path' => $ad_path,
                'position' => request()->get('position'),
                'status' => true,
            ]);
        } else {
            $advertisement->update([
                'name' => request()->get('c_name'),
                'description' => request()->get('ad_description'),
                'position' => request()->get('position'),
                'status' => true,
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
