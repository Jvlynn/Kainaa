@extends('Layouts.app-layout')
@section('title','Home')
@section('content')
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
        <div class="container">
            <a class="navbar-brand" href="#">HOME</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex"  id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                @if (Auth::user()->role == '1')
                <a class=" btn btn-primary" href="{{ route('register') }}">Register</a>
                 @endif
                 <form action="{{ route('logout') }}" method="POST">
                  @csrf
                   <button class="btn btn-danger" type="submit">Logout</button>
                 </form>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
      <div class="alert alert-success" role="alert"> Berhasil Login sebagai {{ Auth::user()->name }}
      </div>
    </div>


    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                  @if (Auth::user()->role_id==1)
                    <a href="{{ route('tambah') }}" class="btn btn-success mb-2">Add Data</a>
                  @endif
                </div>
                    <table border="1" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            @if (Auth::user()->role_id==1)
                            <th>Action</th>
                            @endif
                          </tr>
                        </thead>
                        @foreach ($user as $data)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->role->nama_role }}</td>
                            @if (Auth::user()->role_id==1)
                            <td class="d-flex gap-2 justify-content-center">
                                <a class="btn btn-sm btn-warning text-white" href="edit/{{ $data->id }}">Edit</a>
                                @if ($data->role->nama_role!="admin")  
                                <form action="delete/{{ $data->id }}" method="POST">
                                  @csrf @method('delete')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                              </form>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endforeach
                      </table>
                </div>
            </div>
@if (Auth::user()->role_id==1)
<div class="container mt-5 mb-5">
    <div class="card shadow">
      <div class="card-body">
        <h5> Jumlah User : {{ DB::table('users')->count() }}</h5>
      </div>
    </div>
</div>
@endif
</form>
</body>
@endsection
