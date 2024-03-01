@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('post.update',$post->id)}}">
                    @csrf
  <div class="form-group">
    <label for="post-title">Post Title</label>
    <input type="text" class="form-control" id="post-title" name="title" value="{{$post->title}}" placeholder="Enter Title" required>
   
  </div>
  <div class="form-group">
    <label for="post-description">Post Description</label>
    <textarea class="form-control mb-2" name="description" id="post-description" cols="30" rows="10" placeholder="Enter Post" required>{{$post->description}}</textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
