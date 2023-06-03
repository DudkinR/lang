@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <!-- code-->
   <form method="POST" action="{{ route('story.store') }}">
       @csrf
<div class="form-group">
		   <label for="title">title</label>
		   <input type="text" class="form-control" id="title" name="title" placeholder="title">
</div>
       <div class="form-group">
           <label for="anatation">anatation</label>
           <textarea class="ckeditor form-control" id="anatation" name="anatation"  rows="3"></textarea>
       </div>
       <input type="hidden" name="lng" value="ru">

       <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
</div>

@endsection
