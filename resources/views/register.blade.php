@extends('Layouts.app-layout')

@section('title','Register')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
  <div class="card w-25">
    <div class="card-body">
      <div class="card-title">
        <h5>Register</h5>
      </div>
      <form  action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
          @error('email')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Username</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
          @error('name')
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
        <div class="mb-3">
          <label for="passwordc" class="form-label">Konfirmasi Password</label>
          <input type="password" class="form-control" id="passwordc" name="passwordc">
          @error('passwordc')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="d-flex flex-column align-items-center">
          <span class="">Udah punya akun?<a class="mb-3 text-decoration-none" href="{{ route('login') }}"> Login</a>
        </span>
        <br>
          <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
