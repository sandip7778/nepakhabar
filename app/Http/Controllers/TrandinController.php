<?php

namespace App\Http\Controllers;

use App\Models\tranding_post_show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrandinController extends Controller
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
    public function show(tranding_post_show $tranding)
    {
        if (Auth::user()->isAdmin()) {
            return view('admin.page.others.tranding_show',compact('tranding'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tranding_post_show $tranding)
    {
        if (Auth::user()->isAdmin()) {
            $trandingup = tranding_post_show::find(1);

        $request->validate([
            'count_tranding' => 'required',
        ]);
            $trandingup->update($request->only('count_tranding'));

        $trandingup->save();

        return redirect()->route('tranding.show',1)->with('success', 'Updated successfully.');
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
