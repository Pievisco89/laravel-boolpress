@extends('layouts.app')

@section('content')

  <div class="container">

    <h1>I miei Post</h1>

    @if (session('deleted'))
      <div class="alert alert-success" role="alert">
          <span> <strong>{{ session('deleted') }}</strong> eliminato correttamente</span>
      </div>
    @endif
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Categories</th>
          <th scope="col">Tags</th>
          <th scope="col" colspan="3">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          
          @foreach ($posts as $post)
            <tr>
              <td> {{ $post->id }} </td>
              <td> {{ $post->title }} </td>
              <td> 
                @if ($post->category)
                  {{ $post->category->name }}
                @else
                  -
                @endif
              </td>
              <td>
                @forelse ($post->tags as $tag)
                  <span class="badge badge-primary"> {{ $tag->name }} </span>
                @empty
                    -
                @endforelse
              </td>
              <td> 
                <a href=" {{ route('admin.posts.show', $post) }} " class="btn btn-success">SHOW</a>  
              </td>
              <td> 
                <a class="btn btn-secondary" href=" {{ route('admin.posts.edit', $post) }} ">EDIT</a>
              </td>
              <td> 
                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
              </td>
            </tr>
          @endforeach
          
        </tr>
        
      </tbody>
    </table>

    <div> {{ $posts->links() }} </div>

    @foreach($categories as $category)
        <h4 class="mt-3">{{ $category->name }}</h4>
        <ul>
            @forelse ($category->posts as $post_category)
                
                <li>{{ $post_category->title }}</li>

            @empty
                
                <li>Nessun post presente</li>

            @endforelse
        </ul>
    @endforeach

  </div>
  
@endsection