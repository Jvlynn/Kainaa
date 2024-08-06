@extends('Layouts.app-layout')
@section('title','Edit')
@section('content')
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="container">
            <a href="{{ route('home')}}" class="btn btn-primary"><-</a>
        </div>
            <div class="card-header">
                <h2>Edit Data</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('update',$user->id)}}" method="POST" class="container form-group">
                    @csrf
                    @method('PUT')
                    <label class="d-block">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label class="d-block">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email',$user->email) }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label class="d-block">Password</label>
                    <input type="password" name="password" class="form-control">
                    <button type="submit" class="btn btn-success mt-5 col-md-12">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection