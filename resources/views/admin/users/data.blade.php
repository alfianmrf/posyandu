@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h1 mb-0 text-gray-800">Data Pengguna</h1>
            <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow px-3 py-2"><i
                    class="fas fa-plus fa-sm text-white-100 mr-2"></i> Tambah Pengguna</a>
        </div>
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-secodary shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                <table class="table align-items-center" id="dataTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">No</th>
                                            <th scope="col" class="sort" data-sort="budget">Email</th>
                                            <th scope="col" class="sort" data-sort="status">Nama Pengguna</th>
                                            <th scope="col" class="sort" data-sort="status">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @if ($users)
                                            @foreach ($users as $user)
                                                <tr>
                                                    <th scope="row">
                                                        {{ $loop->iteration }}
                                                    </th>
                                                    <td class="budget">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="budget">
                                                        {{ $user->name }}
                                                    </td>
                                                    <td class="budget">
                                                        {{ Str::ucfirst($user->role) }}
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-warning"
                                                            href="{{ route('users.edit', $user->id) }}">Update</a>
                                                        <form action="/users/{{ $user->id }}" method="post"
                                                            class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-danger border-0" type="submit"
                                                                onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
