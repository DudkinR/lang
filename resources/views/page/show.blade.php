@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <!-- code-->
   <div class="row" >
   {!!$page->text!!}
   <div class="row">
       <a href="{{ route('page.edit',$page) }}?p={{$page->id}}" >
        <button  class="btn btn-primary">Edit</button>
       </a>
   </div>
   </div>
    </div>
</div>
@endsection
