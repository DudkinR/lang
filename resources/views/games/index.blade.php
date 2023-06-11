@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  <!-- add button create game-->
  <a   href="{{ route('game.create') }}" class="btn btn-primary">Create game</a>
     <div class="container">
     @foreach($games as $game)
    <div class="row">
        <div class="col-sm-8">
            <h3>{!! $game->name !!}</h3>
            <p>{!! $game->description !!}</p>
            <p>{!! $game->url !!}</p>
            <p>{{ $game->parameters }}</p>
        </div>
        <div class="col-sm-4">
            <a href="{{ route('game.edit', $game->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('game.show', $game->id) }}" class="btn btn-primary">Show</a>
            <form action="{{ route('game.destroy', $game->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
     </div>
    </div>
</div>
@endsection
