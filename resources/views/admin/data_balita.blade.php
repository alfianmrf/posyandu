@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-10 mb-5 mb-xl-0">
                <div class="table-responsive">
                    <div>
                        <table class="table align-items-center text-align-center" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">No</th>
                                    <th scope="col" class="sort" data-sort="name">No KMS</th>
                                    <th scope="col" class="sort" data-sort="name">Nama Balita</th>
                                    <th scope="col" class="sort" data-sort="budget">Umur</th>
                                    <th scope="col" class="sort" data-sort="status">Jenis Kelamin</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @if ($balitas)
                                    @foreach ($balitas as $balita)
                                        <tr>
                                            <th scope="row" class="text-align-center">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="budget">
                                                {{ $balita->no_kms }}
                                            </td>
                                            <td class="budget">
                                                {{ $balita->balita_name }}
                                            </td>
                                            <td class="budget">
                                                {{ $balita->age }}
                                            </td>
                                            <td class="budget">
                                                @if ($balita->gender == 'L')
                                                    Laki - Laki
                                                @else
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" href="#">Action</a>
                                                <a class="btn btn-primary" href="#">Another action</a>
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
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
