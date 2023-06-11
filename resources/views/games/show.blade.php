@extends('layouts.app')

@section('content')
    <style>
    </style>
  

<div class="container">
    <div class="row justify-content-center">
      <!-- code-->
      <h1> {{ $game->name }}</h1>
      <a   href="{{ route('game.index') }}" class="btn btn-primary">Return back</a>
       <div class="card" >
       <input type="hidden" id="count" value="0">
            <div class="game-container"  id="show_task">
            </div>
       </div>

      
    {!! $game->parameters !!}
    </div>
</div>
{{ asset('storage/story/background/background_19.jpg') }}
<script>
    var data = {!! $game->parameters !!};
    var background = '{{ asset('storage/story/background/background_19.jpg') }}';
    </script>
 
  <script>
    var config = {
      type: Phaser.AUTO,
      width: 800,
      height: 600,
      parent: 'game-container',
      scene: {
        preload: preload,
        create: create,
        update: update
      }
    };

    var game = new Phaser.Game(config);

    function preload() {
      // Загрузка ресурсов игры
    }

    function create() {
      // Создание игровых объектов и настройка сцены
    }

    function update() {
      // Логика обновления игры
    }
  </script>



@if($game->url !== null)
    <script src="{{ asset('js/games/'.$game->url) }}"></script>
@endif

@endsection
