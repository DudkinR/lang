@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  <!-- code-->
  back to index <a href="{{route('pict.index')}}" class="btn btn-primary">Back</a>
<div class="row">
    <div class="col-sm-6">

        <img src="{{asset($pict->url)}}" width="100" alt="" class="img-fluid">
        </div>
<div class="col-sm-6">
    <div class="row">
        <div class="col-md-12">
            <h3>{{$pict->name}}</h3>
        </div>
        <div class="col-md-12">
            <p>{{$pict->discription}}</p>
        </div>
        <div class="col-md-12">


         <a    href="{{route('pict.edit',['pict'=>$pict->id])}}" class="btn btn-primary">Edit</a>
        <form action="{{route('pict.destroy',['pict'=>$pict->id])}}" method="post">
            @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
</div>


    </div>
</div>
@endsection
