<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    //
    public function index()
    {
        $games= Game::all();
        return view('games.index',['games'=>$games]);
    }
    public function show($id)
    {
        $game= Game::find($id);
        return view('games.show',['game'=>$game]);
    }
    public function create()
    {
        return view('games.create');
    }
    public function store(Request $request)
    {
        $game = new Game();
        $game->name = $request->input('name');
        $game->description = $request->input('description');
        $game->url = $request->input('url');
       // select all require where have 'parameter_'
       $parameters = array();
       foreach($request->all() as $key => $value) {
           $keys = explode('_',$key);
           if (count($keys)>0&&$keys[0]=='parameter') {
                if($keys[1]=='name'){
                    $parameters[$keys[2]]['name']=$value;
                }
                if($keys[1]=='type'){
                    $parameters[$keys[2]]['type']=$value;
                }
                if($keys[1]=='value'){
                    $parameters[$keys[2]]['value']=$value;
               }               
           }
        }
        $game->parameters = json_encode($parameters);
        $game->save();
        return redirect()->route('game.index');
    }
    public function edit($id)
    {
        $game= Game::find($id);
        return view('games.edit',['game'=>$game]);
    }
    public function update(Request $request, $id)
    {
        $game= Game::find($id);
        $game->name = $request->input('name');
        $game->description = $request->input('description');
        $game->url = $request->input('url');
              $parameters = array();
       foreach($request->all() as $key => $value) {
           $keys = explode('_',$key);
           if (count($keys)>0&&$keys[0]=='parameter') {
                if($keys[1]=='name'){
                    $parameters[$keys[2]]['name']=$value;
                }
                if($keys[1]=='type'){
                    $parameters[$keys[2]]['type']=$value;
                }
                if($keys[1]=='value'){
                    $parameters[$keys[2]]['value']=$value;
               }               
           }
        }
        $game->parameters = json_encode($parameters);
        $game->save();
        return redirect()->route('game.index');
    }
    public function destroy($id)
    {

        $game = Game::find($id);
    
    if ($game) {
        $game->delete();
    }
    
    return redirect()->route('game.index');
    }
}
