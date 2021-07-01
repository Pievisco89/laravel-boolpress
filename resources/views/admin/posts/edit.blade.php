@extends('layouts.app')

@section('content')

  <div class="container">

    <h1> 
      Modifica:
      <a href=" {{ route('admin.posts.show', $post) }} "> {{ $post->title }} </a>
    </h1>

    <form action=" {{ route('admin.posts.update', $post) }} " method="POST">
      @csrf
      @method('PATCH')

      <div class="mt-2">
        <label for="title" class="form_label mb-2">Title:</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}">
      </div>

      <div class="mt-2">
        <label for="content" class="form_label mb-2">Description:</label>
        <textarea name="content" id="content" class="form-control" rows="7">{{ $post->content }}</textarea>
      </div>

      <div class="d-flex justify-content-between mt-5">
        <a href=" {{ route('admin.posts.index') }} "><< Back</a>
        <button type="submit" class="btn btn-primary">SUBMIT</button>
      </div>
  
    </form>

  </div>
  
@endsection