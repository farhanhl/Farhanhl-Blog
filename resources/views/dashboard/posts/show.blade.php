@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="my-3">{{ $post->title }}</h2>
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back To My Posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger btn border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>
            @if($post->image)
            <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3" alt="...">
            </div>
            @else
                <img src="https://picsum.photos/1200/400" class="img-fluid mt-3" alt="...">
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>
@endsection