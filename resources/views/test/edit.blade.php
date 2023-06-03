@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
<!-- code-->
   <form method="POST" action="{{ route('test.update',$test) }}">
       @csrf
<input type="hidden" name="_method" value="PUT">
       <input type="hidden" name="id" value="{{$test->id}}">
       <div class="form-group">
           <label for="title">title</label>
           <input type="text" class="form-control" id="title" name="title" value="{{$test->title}}">
</div>
       <div class="form-group">
           <label for="anatation">anatation</label>
           <textarea class="ckeditor form-control" id="anatation" name="anatation" rows="3">{{$test->anatation}}</textarea>
       </div>

       <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
@endsection
