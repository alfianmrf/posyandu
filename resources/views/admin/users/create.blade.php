@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-10 mb-5 mb-xl-0">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h1 mb-0 text-gray-800">Tambah Data Pengguna</h1>
                </div>
                <form method="post" action="/users" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12 d-flex align-items-center">
                            <label for="name" class="form-control-label">Nama Pengguna</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input required class="form-control @error('name') is-invalid @enderror" type="text"
                                placeholder="Masukkan Nama Pengguna" id="name" name="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12">
                            <label for="email" class="form-control-label">Email Pengguna</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input required class="form-control @error('email') is-invalid @enderror" type="email"
                                placeholder="Masukkan Email Pengguna" id="email" name="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12">
                            <label for="password" class="form-control-label">Password Pengguna</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input required class="form-control @error('password') is-invalid @enderror" type="password"
                                placeholder="Masukkan Password Pengguna" id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12">
                            <label for="password" class="form-control-label">Role Pengguna</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <select class="form-control @error('password') is-invalid @enderror" required name="role"
                                id="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ Str::ucfirst($role) }}</option>
                                @endforeach
                            </select>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="btn-container d-flex justify-content-md-end justify-content-center">
                        <button type="submit" class="btn btn-primary align-right mb-4">Tambah User</button>
                    </div>
                </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
