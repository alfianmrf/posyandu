@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h1 mb-0 text-gray-800">Laporan Data Balita Posyandu Margorejo</h1>
            <div id="printBtn" class="d-sm-inline-block"></div>
            {{-- <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow px-3 py-2"><i
                    class="fas fa-plus fa-sm text-white-100 mr-2"></i> Tambah Balita</a> --}}
        </div>
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-secodary shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                <table class="table align-items-center" id="dataReport">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name" style="width:10%">No
                                            </th>
                                            <th scope="col" class="sort" data-sort="budget" style="width:10%">No
                                                KMS</th>
                                            <th scope="col" class="sort" data-sort="status" style="width:15%">Nama
                                                Balita</th>
                                            <th scope="col" class="sort" data-sort="status" style="width:15%">
                                                Jenis Kelamin</th>
                                            <th scope="col" class="sort" data-sort="status" style="width:10%">Umur
                                            </th>
                                            <th scope="col" class="sort" data-sort="status" style="width:10%">
                                                Berat Badan Terakhir
                                            </th>
                                            <th scope="col" class="sort" data-sort="status" style="width:10%">
                                                Tinggi Badan Terakhir
                                            </th>
                                            <th scope="col" class="sort" data-sort="status" style="width:20%">
                                                Status Gizi</th>
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
                                                        @if ($balita->gender == 'L')
                                                            Laki Laki
                                                        @else
                                                            Perempuan
                                                        @endif
                                                    </td>
                                                    <td class="budget">
                                                        {{ $balita->age }}
                                                    </td>
                                                    <td class="budget">
                                                        {{ $balita->weight }}
                                                    </td>
                                                    <td class="budget">
                                                        {{ $balita->height }}
                                                    </td>
                                                    <td class="budget">
                                                        {{ $balita->gizi_status }} ({{ $balita->gizi_score }})
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
