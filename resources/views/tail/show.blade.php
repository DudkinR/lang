@extends('layouts.apptail')

@section('content')
<style >
  .container {
    background-image: url("{{ asset('storage/story/background/' . $pagestory->background) }}");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }
</style>
<div class="container" >
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          {!!$pagestory->text!!}
        </div>
        <div class="card-body">
          @if($pagestory->background)
            <img src="{{ asset('storage/story/background/' . $pagestory->background) }}"  width='150' alt="personage" >
            @endif
            <div class="pagination">
            @if ($pagestories->onFirstPage())
                <button class="btn btn-secondary" disabled>Назад</button>
            @else
                <a href="{{ $pagestories->previousPageUrl() }}" class="btn btn-primary">Назад</a>
            @endif

            @if ($pagestories->hasMorePages())
                <a href="{{ $pagestories->nextPageUrl() }}" class="btn btn-primary">Вперед</a>
            @else
                <button class="btn btn-secondary" disabled>Вперед</button>
            @endif
        </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
