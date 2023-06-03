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
                <form action="{{route('pict.update',$pict)}}" method="POST">
                   @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$pict->name}}" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="discription">Discription</label>
                        <textarea name="discription" id="discription" cols="30" rows="10" class="form-control">{{$pict->discription}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="type1">Background</label>
                        <input type="radio" value="1" name="type" id="type1" 
                        @if($pict->path=='storage/story/background/')
                            checked
                        @endif
                        >
                        <label for="type2">Personage</label>
                        <input type="radio" value="2" name="type" id="type2" 
                        @if($pict->path=='storage/story/personage/')
                            checked
                        @endif
                        >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
     </div>


    </div>
</div>
@endsection
