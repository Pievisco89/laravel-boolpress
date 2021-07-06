@extends('layouts.app')

@section('content')

  <div class="container">

    <h1> {{ $post->title }} </h1>

    <h4> 
      @if ($post->category)
        Category: {{ $post->category->name }}
      @else
        A questo post non è associata nessuna categoria!
      @endif  
    </h4>

    <div class="mb-5">

      @forelse ($post->tags as $tag)
        <span class="badge badge-primary"> {{ $tag->name }} </span>  
      @empty
        Nessun tag
      @endforelse
      
    </div>

    <p> {{ $post->content }} </p>

    <div>
    </div>
    <div class="d-flex justify-content-between mt-5">
      <a href=" {{ route('admin.posts.index') }} "><< Back</a>
      <a class="btn btn-secondary" href=" {{ route('admin.posts.edit', $post) }} ">EDIT</a>
    </div>

  </div>
  
@endsection