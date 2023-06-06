@extends('layouts.app')

@section('content')
<?php
    if(isset($_GET['story_id'])) {
        $story_id = $_GET['story_id'];
    } else {
        $story_id = 0;
    }
?>
<div class="container">
    <div class="row justify-content-center">
    <!-- code-->
   <form method="POST" action="{{ route('page.store') }}?story={{$story_id}}">
       @csrf
       <div class="form-group">
           <label for="page">page</label>
           <textarea class="ckeditor form-control" id="page" name="page" rows="10"></textarea>
       </div>
       <input type="hidden" name="story_id" value="{{$story_id}}">
       <input type="hidden" name="lang" value="ru">
       <button type="submit" class="btn btn-primary">Submit</button>
          
        <div class="row">
            <a id="toggleButton1" class="btn" href="#">Смотреть бек</a>
            <a id="toggleButton2" class="btn" href="#">Смотреть персонал</a>
            <div class="col-sm-12" id="select_background" style="display: none;" >
            @foreach($backgrounds as $imgbck)
                <input type="radio" name="background" value="{{$imgbck->id}}" id="back_{{$imgbck->id}}">
              <img src="{{ asset($imgbck->url) }}" alt="{{$imgbck->discription}}" width="100"  class="img-thumbnail">

            @endforeach
            </div>
            <div class="col-sm-12" id="select_personage" style="display: none;" >
  
            @foreach($personages as $imgprsn)
                <input type="checkbox" name="personage_{{$imgprsn->id}}" value="{{$imgprsn->id}}" id="pers_{{$imgprsn->id}}">
              <img src="{{ asset($imgprsn->url) }}" alt="{{$imgprsn->discription}}" width="100"  class="img-thumbnail">

            @endforeach

        </div>
   <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
</div>
<script>

    const toggleButton = document.getElementById('toggleButton1');
    const elements = document.querySelectorAll('#select_background');
    const toggleButton2 = document.getElementById('toggleButton2');
    const elements2 = document.querySelectorAll('#select_personage');


  toggleButton.addEventListener('click', function(event) {
    event.preventDefault(); // Предотвращаем стандартное действие ссылки
    elements.forEach(function(element) {
      if (element.style.display === 'none') {
        element.style.display = 'block'; // Показываем скрытые элементы
      } else {
        element.style.display = 'none'; // Скрываем видимые элементы
      }
    });
  });
toggleButton2.addEventListener('click', function(event) {
        event.preventDefault(); // Предотвращаем стандартное действие ссылки
        elements2.forEach(function(element) {
        if (element.style.display === 'none') {
            element.style.display = 'block'; // Показываем скрытые элементы
        } else {
            element.style.display = 'none'; // Скрываем видимые элементы
        }
        });
    });
</script>
@endsection
