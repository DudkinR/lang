@extends('layouts.apptail')

@section('content')
 <?php
    $background = App\Models\Pict::find($pagestory->background);
    $mass_pers = json_decode($pagestory->pers) ?? [];
    $pers = [];
    if(count($mass_pers)>0)
    {
        foreach($mass_pers as $pict)
        {
           $pers[] = asset(App\Models\Pict::find($pict)->url);

        }
    }
    else
    {
        $pers = null;
    }
?>


    <style>
        .container {
            background-image: url("{{ asset($background->url) }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        #pers_img {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 1;
        }
        .game-container {
          padding: 20px;
          font-size: 18px;
          width: 100%;
          max-width: 800px; /* Максимальная ширина контейнера */
          margin: 0 auto; /* Центрирование контейнера по горизонтали */
        }
        h1 {
          text-align: center; /* Выравнивание по центру */
          font-size: 78px; /* Размер шрифта */
          margin-bottom: 30px; /* Отступ снизу */
        }
        .input_big {
          font-size: 78px; /* Размер шрифта */
          /* Размер size */
           width: 150px; /* Ширина поля */
           text-align: center; /* Выравнивание по центру */

        }
        .btn-block {
          display: block;
        }


    </style>

    <div class="container">
    <img width="300"  class="img-thumbnail"  id="pers_img">
        <div class="row">
            <div class="col-sm-8">
                <div class="card" style="width:800px" >
                    <div class="card-body game-container"  id="show_task">
                    <h3>
                        {!! $pagestory->text !!}
                    </h3>
                    </div>
                    <div class="card-body">
                   
                    </div>

                    <div class="pagination row">
                        <div class="col-sm-1 text-left">
                            @if ($pagestories->onFirstPage())
                                 <a href="{{ asset(route('stories')) }}" class="btn btn-primary">Exit</a>
                            @else
                                <a href="{{ $pagestories->previousPageUrl() }}" class="btn btn-primary">Назад</a>
                            @endif
                        </div>
                    <div class="col-sm-8 text-center">
                          &nbsp;
                          @if($pagestory->game!==null)
                            <a id="game" class="btn btn-primary" onclick="startGame({ 'min': 1, 'max': 10, 'ex': '+' });">Играть</a>
                           @endif
                    </div>

    
                        <div class="col-sm-1  text-right">
                            @if ($pagestories->hasMorePages())
                                <a href="{{ $pagestories->nextPageUrl() }}" class="btn btn-primary">Вперед</a>
                            @else
                               <a href="{{ asset(route('stories')) }}" class="btn btn-primary">Exit</a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
       @if($pagestory->game!==null)
        <script src="{{ asset('js/games/game1.js') }}"></script>
       @endif
        
     <script>
        var massPers = {!! json_encode($pers) !!}; // Преобразуем PHP-массив в JavaScript-массив
        var persImg = document.getElementById('pers_img');
        @if($pagestory->timer!==null)
            var timer ={{$pagestory->timer}}*100;
        @else
            var timer = 1000;
        @endif
        // Функция для изменения изображения каждые 10 секунд
        function changeImage(massPers, persImg, currentIndex,timer) {
            persImg.src = massPers[currentIndex];
            const maxIndex = massPers.length - 1;
            if(massPers==null)
            {
                // hide persImg
                persImg.style.display = 'none';
            }
            else{
            if (currentIndex < maxIndex) {
                    currentIndex++;
                }
                else {
                    currentIndex = 0;
                }
                setTimeout(changeImage, timer, massPers, persImg, currentIndex);
            }
        }
        changeImage(massPers, persImg, 0,timer);

        function resize_screen() {
            var persImg = document.getElementById('pers_img');
            var windowWidth = window.innerWidth;
            if (windowWidth < 1000) {
                persImg.style.width = '30%';
            } else {
                persImg.style.width = '300px'; // или любое другое значение по вашему выбору
            }
        }
        resize_screen();
        window.addEventListener('resize', resize_screen);

    </script>


@endsection
