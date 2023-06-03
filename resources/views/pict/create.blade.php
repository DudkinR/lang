@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <!-- code-->
        <form action="{{route('pict.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name_file">File</label>
                <input type="file" name="filePicture" id="name_file" class="form-control" placeholder="" >
            </div>
            <div class="form-group">
                <label for="discription">Discription</label>
                <input type="text" name="discription" id="discription" class="form-control" placeholder="" >
            </div>
            <!-- radio input -->
            <div class="form-group">
                <label for="type">
                    <h2>Type </h2>
                    </label>
                <input type="radio" name="type" id="type1" value="1" checked> <label for="type">Background</label>
                <input type="radio" name="type" id="type2" value="2"> <label for="type">Personage</label>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div id="picture_show">
                <!-- img load   -->

            </div>
        </form>
    </div>
</div>
<script>
    // file upload
    var file = document.getElementById('name_file');
    var picture_show = document.getElementById('picture_show');
    file.addEventListener('change', function(e) {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function() {
            var img = document.createElement('img');
            img.src = reader.result;
            img.width = 200; // a fake resize
            picture_show.appendChild(img);
        }
        reader.readAsDataURL(file);
    });
</script>
@endsection
