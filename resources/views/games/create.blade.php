@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  <!--  button return back to index-->
  <a href="{{ route('game.index') }}" class="btn btn-primary">Return back</a>
  <div class="container">
<!--  form for create game-->
    <form action="{{ route('game.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="ckeditor form-control" id="description" name="description" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="url">Url</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="Enter url">
        </div>
        <div class="form-group">
            <label for="parameters">Parameters</label>
            <div class ="container" id="parameters">
                    <input type="hidden" id="count_parameters" name="count_parameters" value="0">
                <a href="#" class="btn btn-primary" onclick="AddParam()" id="addParameter">Add parameter</a>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
<script>
function AddParam(){
    var count_parameters= document.getElementById("count_parameters").value;
        count_parameters++;
        //ccreate new row
    var div = document.createElement('div');
    div.className = 'row';
    var    div1 = document.createElement('div');
    div1.className = 'col-sm-4';
    var    div2 = document.createElement('div');
    div2.className = 'col-sm-4';
    var    div3 = document.createElement('div');
    div3.className = 'col-sm-4';
    //create input name
    var input_name = document.createElement('input');
    input_name.type = 'text';
    input_name.className = 'form-control';
    input_name.id = 'parameter_name_'+count_parameters;
    input_name.name = 'parameter_name_'+count_parameters;
    input_name.placeholder = 'Enter parameter name';
    //create input value
    var input_value = document.createElement('input');
    input_value.type = 'text';
    input_value.className = 'form-control';
    input_value.id = 'parameter_value_'+count_parameters;
    input_value.name = 'parameter_value_'+count_parameters;
    input_value.placeholder = 'Enter parameter value default';
    //create select type
    var select_type = document.createElement('select');
    select_type.className = 'form-control';
    select_type.id = 'parameter_type_'+count_parameters;
    select_type.name = 'parameter_type_'+count_parameters;

    //create option string
    var option_string = document.createElement('option');
    option_string.value = 'string';
    option_string.innerHTML = 'string';

    //create option int

    var option_int = document.createElement('option');
    option_int.value = 'int';
    option_int.innerHTML = 'int';
    // create option bool
    var option_bool = document.createElement('option');
    option_bool.value = 'bool';
    option_bool.innerHTML = 'bool';
    // type json
var option_json = document.createElement('option');
    option_json.value = 'json';
option_json.innerHTML = 'json';
    //add option to select
    select_type.appendChild(option_string);
    select_type.appendChild(option_int);
    select_type.appendChild(option_bool);
select_type.appendChild(option_json);
    //add input to div
    div1.appendChild(input_name);
    div2.appendChild(input_value);
    div3.appendChild(select_type);
    //add div to row
    div.appendChild(div1);
    div.appendChild(div2);
    div.appendChild(div3);
    //add row to container
    document.getElementById("parameters").appendChild(div);
    //change count_parameters
    document.getElementById("count_parameters").value=count_parameters;
}
AddParam();
</script>
@endsection
