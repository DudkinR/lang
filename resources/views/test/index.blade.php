@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
<!-- code-->
      <a href="{{ route('test.create') }}" >
        <button  class="btn btn-primary">Add</button>
       </a>
       <div class="container">
           @foreach($tests as $test)
               <div class="row">
                    <div class="col-sm-1">
                    </div>
                    
                    <div class="col-sm-7">
                      <h1> {!!$test->title!!}</h1>
                     <div id="story_anatation_{{$test->id}}" class="text-truncate">{!!$test->anatation!!}</div>
                      </div>
                    
                    <div class="col-sm-2">
                       <a href="{{ route('test.edit',$test) }}" >
                        <button  class="btn btn-primary">Edit</button>
                       </a>
                       <a href="{{ route('test.show',$test) }}" >
                        <button  class="btn btn-primary">Show</button>
                        </a>
                    </div>

                   <div class="col-sm-2">
                    <form method="POST" action="{{ route('test.destroy',$test) }}">
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
@endsection
