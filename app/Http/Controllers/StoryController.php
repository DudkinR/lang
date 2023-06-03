<?php

namespace App\Http\Controllers;


use   App\Models\Story;
use   App\Models\Pagestory;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $stories = Story::all();
        return view('story.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
return view('story.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* 'title',
        'anatation',
        'lng',*/
        $request->validate([
            'title' => 'required',
            'anatation' => 'required',
            'lng' => 'required',
        ]);
        $story =Story::create($request->all());
        $story->save();
        // select all pages from story attach
       // $pagestories = $story->pagestory()->get();
    return redirect()->route('story.show', compact('story'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        //
        $story=Story::find($story->id);
       $pagestories= $story->pagestory()->get();
        return view('story.show', compact('story','pagestories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        //
       // $story=Story::find($story->id);
return view('story.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story)
    {
        //
$request->validate([
            'title' => 'required',
            'anatation' => 'required',
            'lng' => 'required',
        ]);
$story->update($request->all());
$story->save();
$pagestories= $story->pagestory()->get();
return redirect()->route('story.show', compact('story','pagestories'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
       // Удаляем все связанные записи в таблице pagestories
    $story->pagestory()->delete();
    $story->delete();
    return redirect()->route('story.index');

    }

}
