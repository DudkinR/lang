@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <!-- code-->
      <a href="{{ route('story.create') }}" >
        <button  class="btn btn-primary">Add</button>
       </a>
       <div class="container">
           @foreach($stories as $story)
               <div class="row">
                    <div class="col-sm-1">
                    </div>
                    
                    <div class="col-sm-7">
                      <h1> {!!$story->title!!}</h1>
                     <div id="story_anatation_{{$story->id}}" class="text-truncate">{!!$story->anatation!!}</div>
                     <button class="btn btn-link" onclick="toggleFullText('story_anatation_{{$story->id}}')">Показать полный текст</button>

                    </div>
                    
                    <div class="col-sm-2">
                       <a href="{{ route('story.edit',$story) }}" >
                        <button  class="btn btn-primary">Edit</button>
                       </a>
                       <a href="{{ route('story.show',$story) }}" >
                        <button  class="btn btn-primary">Show</button>
                        </a>
                         <a href="{{ route('tail.show',$story) }}" >
                        <button  class="btn btn-success">Look</button>
                        </a>
                    </div>

                    
                    <div class="col-sm-2">
                    <form method="POST" action="{{ route('story.destroy',$story) }}">
                        @csrf
                        @method('DELETE')

                        <button  class="btn btn-danger">delete</button>
                    </form>
                    </div>

               </div>
           @endforeach
       </div>
    </div>
</div>
<script>
function toggleFullText(elementId) {
  var element = document.getElementById(elementId);
  var button = event.target;

  if (element.classList.contains('truncate')) {
    element.classList.remove('truncate');
    button.textContent = 'Скрыть текст';
  } else {
    element.classList.add('truncate');
    button.textContent = 'Показать полный текст';
  }
}
</script>


@endsection
