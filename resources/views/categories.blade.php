@extends('layouts.main')

@section('welcome')
<h1 class="my-3 text-center">Categories</h1>

<div class="row">
@foreach ($categories as $category)
<div class="col-md-4 my-3">
    <div class="card bg-dark text-white">
        <a href="/blog?category={{ $category->slug }}" class="text-light text-decoration-none">
        <img src="https://picsum.photos/500/500" class="card-img" alt="...">
        <div class="card-img-overlay d-flex align-items-center p-0">
          <h5 class="card-title text-center flex-fill bg-dark py-3 fs-3">{{ $category->name }}</h5>
        </div>
      </div>
    </a>
</div>
@endforeach
</div>
@endsection

