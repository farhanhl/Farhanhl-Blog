@extends('layouts.main')

@section('welcome')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="my-3">{{ $post->title }}</h2>
            <p>By <u><a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a></u> In <a href="/blog?category={{ $post->category->slug }}"><u>{{ $post->category->name }}</u></a></p>
            @if($post->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="...">
                </div>
            @else
                <img src="https://picsum.photos/1200/400" class="img-fluid" alt="...">
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            <a href="/blog" class="d-block mt-3">Back To Post</a>
        </div>
    </div>
</div>
@endsection