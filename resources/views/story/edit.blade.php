@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <!-- code-->
            <a href="{{ route('stories') }}" >
            <button  class="btn btn-primary">Back</button>
         </a>

   <form method="POST" action="{{ route('story.update',$story) }}">
       @csrf
@method('PUT')
       <input type="hidden" name="id" value="{{$story->id}}">
       <div class="form-group">
           <label for="title">title</label>
           <input type="text" class="form-control" id="title" name="title" value="{{$story->title}}">
</div>
       <div class="form-group">
           <label for="story">story</label>
           <textarea class="ckeditor form-control" id="anatation" name="anatation" rows="3">{{$story->anatation}}</textarea>
       </div>

       <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
@endsection
