@extends('layouts.app')

@section('content')

  <div class="container">

    <h1> Nuovo Post </h1>
    @if ($errors->any())
      
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
          @endforeach
        </ul>
      </div>
       
    @endif

    <form action=" {{ route('admin.posts.store') }} " method="POST">
      @csrf
      @method('POST')

      <div class="mt-2">
        <label for="title" class="form_label mb-2">Title:</label>
        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Scrivi qui...">
        @error('title')      
          <p class="text-danger"> {{$message}} </p>
        @enderror
      </div>

      <div class="mt-2">
        <label for="content" class="form_label mb-2">Description:</label>
        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="7" placeholder="Scrivi qui..."> {{ old('content') }} </textarea>
        @error('content')       
          <p class="text-danger"> {{$message}} </p>
        @enderror
      </div>

      <div class="d-flex justify-content-between mt-5">
        <a href=" {{ route('admin.posts.index') }} "><< Back</a>
        <div>          
          <button type="submit" class="btn btn-primary">SUBMIT</button>
          <button type="reset" class="btn btn-secondary">RESET</button>
        </div>
      </div>
    
    </form>

  </div>
  
@endsection