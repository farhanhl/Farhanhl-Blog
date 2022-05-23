@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>
<div class="col-lg-8">
<a href="/dashboard/categories" class="btn btn-success mb-3"><span data-feather="arrow-left"></span> Back To My Posts</a>
<form method="POST" action="/dashboard/categories/{{ $category->slug }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
        <label class="form-label">Category Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" name="name" id="name" required>
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $category->slug) }}" name="slug" id="slug" required>
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    <button type="submit" class="btn btn-primary">Update Category</button>
  </form>
</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    name.addEventListener('change', function() {
      fetch('/dashboard/categories/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    });
  </script>
@endsection