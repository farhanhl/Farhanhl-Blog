@extends('layouts.main')

@section('welcome')
<div class="container">
  @if(session()->has('success'))
    <script>
      Swal.fire(
        'Registration successfull',
        'Please Login',
        'success'
      )
    </script>
  @endif
  <div class="row justify-content-center my-5 formlaravel">
      <div class="col-lg-6 rounded shadow p-0">
        <div class="bg-primary py-4 fs-3 container text-light text-center rounded-top mb-3">
          Please Register
        </div>
          <div class="container">
            <form method="POST" action="/register">
              @csrf
              <div class="mb-3 form-floating">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                  <label for="Name" class="form-label">Name</label>
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                  <label for="Username" class="form-label">Username</label>
                  @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              <div class="mb-3 form-floating">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
                  <label for="Email" class="form-label">Email address</label>
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3 form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                  <label for="Password" class="form-label">Password</label>
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
          </form>
          <small class="d-block text-center my-3">Already registered? <a href="/login">Click here</a> </small>
      </div>
      </div>
    </div>
  </div>
@endsection