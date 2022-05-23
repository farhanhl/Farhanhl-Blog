@extends('dashboard.layouts.main')

@section('container')
  @if(session()->has('success'))
    <script>
      Swal.fire(
        'Posted',
        '',
        'success'
      )
    </script>
  @endif

  @if(session()->has('destroyed'))
    <script>
      Swal.fire(
        'Post deleted',
        '',
        'success'
      )
    </script>
  @endif

  @if(session()->has('edited'))
    <script>
      Swal.fire(
        'Post edited',
        '',
        'success'
      )
    </script>
  @endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All Post By {{ auth()->user()->name }}</h1>
</div>
<div class="table-responsive">
  <a href="/dashboard/posts/create" class="btn btn-success mb-3">Create New Post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <td>{{ $loop->iteration  }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
              <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="badge bg-danger btn border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span></button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection