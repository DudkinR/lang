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
    </form>

    </div>
</div>

@endsection
