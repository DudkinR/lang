@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <!-- code-->
      <a href="{{ route('page.create') }}" >
        <button  class="btn btn-primary">Add</button>
       </a>
       <div class="container">
           @foreach($pages as $page)
               <div class="row">
                    <div class="col-sm-1">
                    </div>
                    
                    <div class="col-sm-7">
                        {!!$page->text!!}
                        @if($page->background!==null)
                            <?php
                                $bp=App\Models\Pict::find($page->background);
                            ?>
                          <img src="{{ asset($bp->url) }}" alt="background" class="img-thumbnail">
                          {{$bp->discription}}
                        @endif
                    </div>
                    
                    <div class="col-sm-2">
                       <a href="{{route('page.edit',$page->id)}}" >
                        <button  class="btn btn-primary">Edit</button>
                       </a>
                    </div>
                    
                    <div class="col-sm-2">
                        <button  class="btn btn-danger">delete</button>
                    </div>

               </div>
           @endforeach
       </div>
    </div>
</div>
@endsection
