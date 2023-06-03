@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">
        <h2>New pict</h2>
        <a href="{{route('pict.create')}}" class="btn btn-primary">Create</a>
    </div>
  <!-- conteiner pict_background-->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h2>Background</h2>
      </div>
      @if($pict_background->count())
      @foreach($pict_background as $pict)
      <div class="row">
        <div class="col-md-4">

            <img src="{{asset($pict->url)}}" width="100" alt="" class="img-fluid">
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <h3>{{$pict->name}}</h3>
                   </div>
                <div class="col-md-12">
                    <p>{{$pict->discription}}</p>
                </div>
                <div class="col-md-12">
           
<a href="{{route('pict.show',['pict'=>$pict->id])}}" class="btn btn-primary">Show</a>
                    <a href="{{route('pict.edit',['pict'=>$pict->id])}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('pict.destroy',['pict'=>$pict->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
  <!-- conteiner pict_personage-->
<div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Personage</h2>
        </div>
        @if($pict_personage->count())
        @foreach($pict_personage as $pict)
        <div class="row">
        <div class="col-md-4">
            <img src="{{asset($pict->url)}}" width="100" alt="" class="img-fluid">
            </div>
            <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                <h3>{{$pict->name}}</h3>
                </div>
                <div class="col-md-12">
                <p>{{$pict->discription}}</p>
                </div>
                <div class="col-md-12">
                <a href="{{route('pict.edit',['pict'=>$pict->id])}}" class="btn btn-primary">Edit</a>
                <form action="{{route('pict.destroy',['pict'=>$pict->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
    
                </div>
            </div>
        </div>
        @endforeach
@endif
        </div>
</div>
@endsection
