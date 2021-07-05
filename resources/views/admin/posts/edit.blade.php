@extends('layouts.app')

@section('content')

  <div class="container">

    <h1> 
      Modifica:
      <a href=" {{ route('admin.posts.show', $post) }} "> {{ $post->title }} </a>
    </h1>

    @if ($errors->any())
      
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
          @endforeach
        </ul>
      </div>
       
    @endif

    <form action=" {{ route('admin.posts.update', $post) }} " method="POST">
      @csrf
      @method('PATCH')

      <div class="mt-2">
        <label for="title" class="form_label mb-2">Title:</label>
        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}" value="{{ old('title', $post->title) }}">
        @error('title')      
          <p class="text-danger"> {{$message}} </p>
        @enderror
      </div>

      <div class="mt-2">
        <label for="content" class="form_label mb-2">Description:</label>
        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="7">{{ old('content',$post->content) }}</textarea>
        @error('content')       
          <p class="text-danger"> {{$message}} </p>
        @enderror
      </div>

      <div class="mt-2">
        <label for="category_id" class="form_label mb-2">Category:</label>
        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
          <option value="">Chose category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}"
              @if(old('category_id', $post->category_id) == $category->id)
                selected    
              @endif  
            > 
              {{ $category->name }}
            </option>
          @endforeach
        </select>
        @error('category_id')
          <p class="text-danger"> {{$message}} </p>  
        @enderror
      </div>

      <div class="d-flex justify-content-between mt-5">
        <a href=" {{ route('admin.posts.index') }} "><< Back</a>
        <button type="submit" class="btn btn-primary">SUBMIT</button>
      </div>
  
    </form>

  </div>
  
@endsection