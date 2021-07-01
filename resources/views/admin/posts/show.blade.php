@extends('layouts.app')

@section('content')

  <div class="container">

    <h1> {{ $post->title }} </h1>

    <p> {{ $post->content }} </p>

    <div>
    </div>
    <div class="d-flex justify-content-between mt-5">
      <a href=" {{ route('admin.posts.index') }} "><< Back</a>
      <a class="btn btn-secondary" href=" {{ route('admin.posts.edit', $post) }} ">EDIT</a>
    </div>

  </div>
  
@endsection