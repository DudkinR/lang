@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <!-- code-->
   <div class="row">
        <div class="col-sm-12">
           <h1 >   {!!$story->title!!} </h1>
           <p> {!!$story->anatation!!} </p>
        </div>
   </div>
    <div class="row">
        <a href="{{ route('story.edit',$story) }}" >
        <button  class="btn btn-primary">Edit</button>
        </a>
    </div>
</div>
<div class="container" id="storytext">
   <!-- rows stories generate js-->
   @isset($pagestories)
        @foreach($pagestories as $pagestory)
            <div class="row">
                <div class="col-sm-12">
                    {!!$pagestory->text!!}
                    @if($pagestory->background)
                     <img src="{{ asset('storage/story/background/' . $pagestory->background) }}" width="100" alt="background" class="img-thumbnail">
                     @endif
                     <a href="{{ route('page.edit',$pagestory) }}?p={{$pagestory->id}}" >
                    <button  class="btn btn-primary">Edit</button>
                    </a>
                </div>
            </div>
          @endforeach
   @endif
</div>
<div class="container">
    <div class="row" >
    <a name="page_create"></a>
        <a href="{{ route('page.create') }}?story_id={{$story->id}}" >
        <button  class="btn btn-primary">new page</button>
        </a>
    </div
</div>
<script>

function generateStory(pagestories) {
  var storytext = document.getElementById('storytext');

  for (var i = 0; i < pagestories.length; i++) {
    var row = document.createElement('div');
    row.className = 'row';

    var col = document.createElement('div');
    col.className = 'col-sm-12';

    var content = pagestories[i].text;
    col.innerHTML = content;
    // add link button  to edit page
var a = document.createElement('a');
a.href = "'{{ route('page.edit',0) }}".replace('1',pagestories[i].id);
a.innerHTML = 'edit';
a.className = 'btn btn-primary';
col.appendChild(a);

    row.appendChild(col);
    storytext.appendChild(row);
  }
}
    var story = {!! json_encode($story) !!};
    @isset($pagestories)
        var pagestories = {!! json_encode($pagestories) !!};
    @else
        var pagestories = [];
    @endif
   // generateStory(pagestories);
    // go to page_create #
    // Найти элемент с атрибутом name равным "page_create"
    var anchorElement = document.querySelector('a[name="page_create"]');
    // Проверить, что элемент найден
    if (anchorElement) {
      // Прокрутить до элемента с использованием метода scrollIntoView()
      anchorElement.scrollIntoView();
    }


</script>
@endsection
