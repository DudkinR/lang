@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  <!-- code-->

<div class="row">
        <div class="col-sm-12">
           <h1 >   {!!$test->title!!} </h1>
           <p> {!!$test->anatation!!} </p>
        </div>
   </div>
    <div class="row">
        <a href="{{ route('test.edit',$test) }}" >
        <button  class="btn btn-primary">Edit</button>
        </a>
    </div>
</div>


    </div>
</div>
@endsection
