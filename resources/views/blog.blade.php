@extends('layouts.main')

@section('welcome')
<h1 class="text-center my-3">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/blog">
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if (request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
      </div> 
    </form>
  </div>
</div>

@if ($posts->count())
  <div class="card mb-3 my-3">
    <a href="/posts/{{ $posts[0]->slug }}">
      @if($posts[0]->image)
      <div style="max-height: 350px; overflow:hidden">
        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="...">
      </div>
      @else
          <img src="https://picsum.photos/1200/400" class="img-fluid" alt="...">
      @endif
    </a>
    <div class="card-body text-center">

      <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>

      <small class="text-muted"><p>By <u class="text-decoration-none"><a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a></u> In <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none"><u class="text-decoration-none">{{ $posts[0]->category->name }}</u></a> {{ $posts[0]->created_at->diffForHumans() }}
      </p></small>

      <p class="card-text">{!! $posts[0]->excerpt !!}</p>
      <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary text-decoration-none">Read More..</a>
    </div>
  </div>

<div class="container">
  <div class="row">
    @foreach($posts->skip(1) as $post)
    <div class="col-md-4 mb-3">
      <div class="card" style="height: 100%">
        <div class="position-absolute p-2" style="background-color: rgba(0, 0, 0, 0.7)">
          <a href="/blog?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
        </div>
        <a href="/posts/{{ $post->slug }}">
          @if($post->image)
          <div style="max-height: 400px; overflow:hidden">
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="...">
          </div>
          @else
              <img src="https://picsum.photos/500/400" class="img-fluid" alt="...">
          @endif
        </a>
        <div class="card-body">
          <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h5>
          <small class="text-muted"><p>By <u class="text-decoration-none"><a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a></u> {{ $post->created_at->diffForHumans() }}
          </p></small>
          <p class="card-text">{!! $post->excerpt !!}</p>
          <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@else
  <p class="text-center fs-4">No post found.</p>
@endif

{{ $posts->links() }}
@endsection

