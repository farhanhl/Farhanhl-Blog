@extends('layouts.main')

@section('welcome')
<div class="container">
  @if(session()->has('loginError'))
    <script>
      Swal.fire(
        'Login Failed',
        '',
        'error'
      )
    </script>
  @endif
  <div class="row justify-content-center my-5 formlaravel">
      <div class="col-lg-6 rounded shadow p-0">
          <div class="bg-primary py-4 fs-3 container text-light text-center rounded-top mb-3">
            Please Login
          </div>
          <div class="container">
            <form method="POST" action="/login">
              @csrf
                <div class="mb-3 form-floating">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                  <label for="Email" class="form-label">Email address</label>
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  </div>
                  <div class="mb-3 form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    <label for="Password" class="form-label">Password</label>
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center my-3">Not registered? <a href="/register">Click here</a> </small>
      </div>
      </div>
    </div>
  </div>
@endsection