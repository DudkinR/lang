@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <!-- code-->
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
              <img src="{{ asset('storage/story/background/' . $page->background) }}" alt="background" class="img-thumbnail">

            @endif
            </div>
            <div class="row">
          


            <div class="col-sm-12" id="select_background" style="display: none;" >
            @foreach($backgrounds as $imgbck)
                <input type="radio" name="background" value="{{$imgbck}}" id="{{$imgbck}}"
                @if($imgbck== $page->background)
                    checked
                @endif

                >
              <img src="{{ asset('storage/story/background/' . $imgbck) }}" alt="{{$imgbck}}" width="100"  class="img-thumbnail">

            @endforeach
            </div>

        </div>
  
    </form>
    <a id="toggleButton" class="btn" href="#">Нажмите, чтобы переключить видимость</a>
    </div>
</div>
<script>

  const toggleButton = document.getElementById('toggleButton');
  const elements = document.querySelectorAll('#select_background');

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
</script>

@endsection
