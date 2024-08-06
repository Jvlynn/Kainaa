@extends('Layouts.app-layout')
@section('title','Add')
@section('content')
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="container">
            <a href="{{ route('home') }}" class="btn btn-primary"><-</a>
        </div>
            <div class="card-header">
                <h2>Add Data</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('tambah.store')}}" method="POST" class="container form-group">
                    @csrf
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <span>{}</span>
                            @enderror
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <button type="submit" class="btn btn-success mt-5 col-md-12">Add</button>
                </form>
            </div>
        </div>
    </div>

@endsection