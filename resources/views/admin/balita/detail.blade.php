@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h1 mb-0 text-gray-800">Data Balita Anda</h1>
                    <div class="btn-container">
                        <a href="{{ route('balita.edit', $balita->id) }}"
                            class="d-none d-sm-inline-block btn btn-warning shadow px-3 py-2"><i
                                class="fas fa-edit fa-sm text-white-100 mr-2"></i> Edit Data Balita</a>
                        <a href="{{ route('balita.growth', $balita->id) }}"
                            class="d-none d-sm-inline-block btn btn-primary shadow px-3 py-2"><i
                                class="fas fa-table fa-sm text-white-100 mr-2"></i> Data Perkembangan</a>
                    </div>
                </div>
                <table>
                    <tr>
                        <td>No KMS </td>
                        <td class="px-3"> : </td>
                        <td>{{ $balita->no_kms }}</td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap Balita </td>
                        <td class="px-3"> : </td>
                        <td>{{ $balita->balita_name }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ayah Balita </td>
                        <td class="px-3"> : </td>
                        <td>{{ $balita->father_name }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu Balita </td>
                        <td class="px-3"> : </td>
                        <td>{{ $balita->mother_name }}</td>
                    </tr>
                    <tr>
                        <td>Alamat Balita </td>
                        <td class="px-3"> : </td>
                        <td>{{ $balita->address }}</td>
                    </tr>
                    <tr>
                        <td>No. Telp Orang Tua </td>
                        <td class="px-3"> : </td>
                        <td>{{ $balita->telp_numb }}</td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir </td>
                        <td class="px-3"> : </td>
                        <td>{{ $balita->city_born }},
                            {{ date('d-m-Y', strtotime($balita->date_born)) }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin Balita</td>
                        <td class="px-3"> : </td>
                        <td>{{ $balita->gender }}</td>
                    </tr>
                    <tr>
                        <td>Umur Balita</td>
                        <td class="px-3"> : </td>
                        <td>{{ $lastGrowth->age }}</td>
                    </tr>
                    <tr>
                        <td>Berat Badan Balita</td>
                        <td class="px-3"> : </td>
                        <td>{{ $lastGrowth->weight }}</td>
                    </tr>
                    <tr>
                        <td>Tinggi Badan Balita</td>
                        <td class="px-3"> : </td>
                        <td>{{ $lastGrowth->height }}</td>
                    </tr>
                    <tr>
                        <td>Status Gizi Balita</td>
                        <td class="px-3"> : </td>
                        <td>{{ $lastGrowth->gizi_score }} - {{ $lastGrowth->gizi_status }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection


@push('js')
    <script src="/js/calculate.js"></script>
@endpush
