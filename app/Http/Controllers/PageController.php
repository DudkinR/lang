<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use   App\Models\Pagestory;
use   App\Models\Story;
use   App\Models\Tail;
use   Aapp\Models\Pict;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $store=Story::find($request->story_id);
        $pages = $store->pagestory()->get();
        return view('page.index', compact('$pages','store'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $store_id=$request->story_id;
        return view('page.create',compact('store_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $pagestory = new Pagestory();
    $pagestory->text = $request->page;
    if ($request->timer) {
        $pagestory->timer = $request->timer;
    }
    if ($request->background) {
        $pagestory->background = $request->background;
    }
    $pagestory->story_id = $request->story_id;
    $order= $this->maxorder($request->story_id);
    $pagestory->order = $order+1;
    $pagestory->save();
    // select all pages from story attach
    $story = Story::find($request->story_id);
    $pagestories= $story->pagestory()->get();
    
    return redirect()->route('story.show', compact('story','pagestories'));
}

/**
 * Находит максимальное значение 'order' для story_id.
 */
public function maxorder($story_id)
{
    $story = Story::find($story_id);
   $pagestories_max = $story->pagestory() ->max('order');
    if (!$pagestories_max) {
        $pagestories_max = 0;
    }
    return $pagestories_max;
}

    /**
     * Display the specified resource.
     */
    public function show(Pagestory $page)
    {
        return view('page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Pagestory $page)
    {
       if($request->p){
            $page=Pagestory::find($request->p);
           return view('page.edit',  ['p' => $page->id,'page'=>$page,'backgrounds'=>$this->select_background()]);
       }
        //return view('page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pagestory $page)
    {
       
        $page->text=$request->text;
        if($request->timer){
            $page->timer=$request->timer;
        }
        if($request->background){
        // upload file background
        $newName=$this->rename();
        $type = $request->file('background')->getClientOriginalExtension();

        $request->background->storeAs('public/story/background', $newName.'.'.$type);
         $page->background=$newName.'.'.$type;
        }
        $page->save();
         $pict_background=   Pict::where('path', 'storage/story/background/')->get();
        $pict_personage=   Pict::where('path', 'storage/story/personage/')->get();
        return redirect()->route('page.edit', [
            'p' => $page->id,
            'page'=>$page,
            'backgrounds'=>$pict_background,
            'personages'=>$pict_personage
        ]);

    }
    public function rename(){
        //'storage/story/background/'  next name file
        $path = storage_path('app/public/story/background');
        $files = scandir($path);
        $max=0;
        if(count($files)==2){
            return  $newName='background_1';
        }
        foreach ($files as $file) {
            if($file!=='.'&&$file!=='..'){
                $name=explode(".",$file);
                $num=explode("_",$name[0]);
                if($num[1]>$max){
                    $max=$num[1];
                }
            }
        }
         return  $newName='background_'.($max+1);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pagestory $page)
    {
        //
        $page->delete();
        return redirect()->route('page.index');
    }
}
