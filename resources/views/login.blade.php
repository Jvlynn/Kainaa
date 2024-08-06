@extends('Layouts.app-layout')

@section('title','Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
  <div class="card w-25">
    <div class="card-body">
      <div class="card-title">
        <h5>LOGIN</h5>
      </div>
      <form  action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" >
          @error('email')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
          @error('password')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="d-flex flex-column align-items-center">
          <span class="mb-3">Belum punya akun?
          <a class="mb-3 text-decoration-none" href="{{ route('register') }}"> Register</a>
        </span>
          <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>s
@endsection
