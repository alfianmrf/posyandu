@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h1 mb-0 text-gray-800">Data Balita</h1>
            {{-- <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow px-3 py-2"><i
                    class="fas fa-plus fa-sm text-white-100 mr-2"></i> Tambah Balita</a> --}}
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
                                            <th scope="col" class="sort" data-sort="budget">No KMS</th>
                                            <th scope="col" class="sort" data-sort="status">Nama Balita</th>
                                            <th scope="col" class="sort" data-sort="status">Tempat, Tanggal Lahir
                                            </th>
                                            <th scope="col" class="sort" data-sort="status">Gender</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @if ($balitas)
                                            @foreach ($balitas as $balita)
                                                <tr>
                                                    <th scope="row">
                                                        {{ $loop->iteration }}
                                                    </th>
                                                    <td class="budget">
                                                        {{ $balita->no_kms }}
                                                    </td>
                                                    <td class="budget">
                                                        {{ $balita->balita_name }}
                                                    </td>
                                                    <td class="budget">
                                                        {{ $balita->city_born }},
                                                        {{ date('d-m-Y', strtotime($balita->date_born)) }}
                                                    </td>
                                                    <td class="budget">
                                                        @if ($balita->gender == 'L')
                                                            Laki Laki
                                                        @else
                                                            Perempuan
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('balita.detail', $balita->id) }}">Detail</a>
                                                        <form action="/balita/{{ $balita->id }}" method="post"
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
