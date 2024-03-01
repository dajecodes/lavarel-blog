@extends('layouts.frontend')

@section('content')

<div class="card text-center">
  <div class="card-header">
  {{$post->title}}
  </div>
  <div class="card-body">
    
    <p class="card-text">{{$post->description}}</p>
    
  </div>
  <div class="card-footer text-body-secondary">
    {{date("y-m-d",strtotime($post->created_at))}}
  </div>
</div>
@endsection