@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <!-- code-->
   <a  href="{{ route('story.show',$page->story_id) }}" >
            <button  class="btn btn-primary">Back</button>
</a>
        <form method="POST" action="{{ route('page.update',$page) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="text">Text</label>
            <textarea class="ckeditor form-control" id="text" name="text" rows="3">{!!$page->text!!}</textarea>
            </div>
            <div class="form-group">
                <label for="timer">Timer</label>
            <input type="text" class="form-control" id="timer" name="timer" value="{{$page->timer}}">
            </div>

                 <button type="submit" class="btn btn-primary">Submit</button>
            <div class="row">
            <div class="col-sm-12" id="view_background">
            @if($page->background!==null)
                <?php
                    $bp=App\Models\Pict::find($page->background);
                ?>
              <img src="{{ asset($bp->url) }}" alt="background" class="img-thumbnail">{{$bp->discription}}

            @endif
            </div>

            <div class="row">
          


            <div class="col-sm-12" id="select_background" style="display: none;" >
            @foreach($backgrounds as $imgbck)
                <input type="radio" name="background" value="{{$imgbck->id}}" id="back_{{$imgbck->id}}"
                @if($imgbck->id== $page->background)
                    checked
                @endif

                >
              <img src="{{ asset($imgbck->url) }}" alt="{{$imgbck->discription}}" width="100"  class="img-thumbnail">

            @endforeach
            </div>
            <div class="col-sm-12" id="select_personage" style="display: none;" >
            <?php
            //json to array
            $mass_pers = json_decode($page->pers);
            if($mass_pers==null){
                $mass_pers=[];
            };
            ?>
            @foreach($personages as $imgprsn)
                <input type="checkbox" name="personage_{{$imgprsn->id}}" value="{{$imgprsn->id}}" id="pers_{{$imgprsn->id}}"

                @if( in_array($imgprsn->id, $mass_pers))
                    checked
                @endif

                >
              <img src="{{ asset($imgprsn->url) }}" alt="{{$imgprsn->discription}}" width="100"  class="img-thumbnail">

            @endforeach

        </div>
  
    </form>
    <a id="toggleButton1" class="btn" href="#">Смотреть бек</a>
    <a id="toggleButton2" class="btn" href="#">Смотреть персонал</a>
    </div>
</div>
<script>

  const toggleButton = document.getElementById('toggleButton1');
  const elements = document.querySelectorAll('#select_background');
  const    toggleButton2 = document.getElementById('toggleButton2');
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
