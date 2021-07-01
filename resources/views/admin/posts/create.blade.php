@extends('layouts.app')

@section('content')

  <div class="container">

    <h1> Nuovo Post </h1>

    <form action=" {{ route('admin.posts.store') }} " method="POST">
      @csrf
      @method('POST')

      <div class="mt-2">
        <label for="title" class="form_label mb-2">Title:</label>
        <input type="text" id="title" name="title" class="form-control" placeholder="Scrivi qui...">
      </div>

      <div class="mt-2">
        <label for="content" class="form_label mb-2">Description:</label>
        <textarea name="content" id="content" class="form-control" rows="7" placeholder="Scrivi qui..."></textarea>
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