<?php

namespace App\Http\Controllers;

use App\Models\Tail;
use Illuminate\Http\Request;
use    App\Models\Pagestory;
use    App\Models\Story;
use Illuminate\Support\Facades\Auth;


class TailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('tail.index');
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
    public function store($story_id,$user_id)
    {
        //// add tail with story_id and page_id and user_id
        
        $pages_story = Pagestory::where('story_id', $story_id)->get();
        // add all rows from pages_story to tail
        foreach($pages_story as $page_id){
            // with    user_id and read = 0
            $tail = new Tail();
            $tail->user_id = $user_id;
            $tail->story_id = $story_id;
            $tail->pagestory_id = $page_id->id;
            $tail->read = 0;
            $tail->save();

        }

    }

    /**
     * Display the specified resource.
     */
public function show(String $id, Request $request)
{
    $story_id = $id;
    $user_id = Auth::user()->id;

    if (Tail::where('user_id', $user_id)->where('story_id', $story_id)->exists()) {
        $tail = Tail::where('user_id', $user_id)->where('story_id', $story_id)->get();
    } else {
        $this->store($story_id, $user_id);
        $tail = Tail::where('user_id', $user_id)->where('story_id', $story_id)->get();
    }

    // Order by Pagestory order
    $tail = $tail->sortBy('pagestory.order');

    // Find first pagestory_id with read = 0
    $pagestory_id = $tail->where('read', 0)->first()->pagestory_id;
    $tail->where('pagestory_id', $pagestory_id)->first()->read = 1;
    $tail->where('pagestory_id', $pagestory_id)->first()->save();

    // Fetch the pagestory with pagination
    $pagestory = Pagestory::find($pagestory_id);
    $page = $request->query('page', 1); // Get the current page from the query parameters
    $perPage = 10; // Number of pagestories per page
    $totalPagestories = Pagestory::count(); // Total number of pagestories
    $pagestories = Pagestory::orderBy('order')->paginate($perPage, ['*'], 'page', $page);

    return view('tail.show', [
        'tail' => $tail,
        'pagestory' => $pagestory,
        'pagestories' => $pagestories,
        'totalPagestories' => $totalPagestories,
    ]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tail $tail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tail $tail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tail $tail)
    {
        //
    }
}
