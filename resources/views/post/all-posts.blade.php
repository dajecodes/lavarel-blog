@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <div class="col-md-12">
    <table class="table table-hover">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>
      {{$post->description}}
      </td>
      <td>
        <a class="btn btn-sm btn-primary" href="{{route('post.edit',$post->id)}}">Edit</a>
        <a class="btn btn-sm btn-danger" href="{{route('post.delete',$post->id)}}">Delete</a>
      </td>
    </tr>
    @endforeach
   

  </tbody>
</table>
    </div>
  </div>


</div>
@endsection