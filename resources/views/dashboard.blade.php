@extends('layouts.app')

@section('content')
    @can('admin')
        @include('layouts.headers.cards')
    @endcan

    <div class="container-fluid @can('user') mt-4" @endcan>
        <div class=" row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            @can('user')
                @if ($balita && $lastGrowth)
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
                @else
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h1 mb-0 text-gray-800">
                            Hi, {{ Auth::user()->name }}
                            <br>
                            Masukkan Data Lengkap Dulu Ya !
                        </h1>
                    </div>
                    <form method="post" action="/balita" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="no_kms" class="form-control-label">No KMS</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('no_kms') is-invalid @enderror" type="text"
                                    placeholder="Masukkan No KMS Balita" id="no_kms" name="no_kms">
                                @error('no_kms')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="balita_name" class="form-control-label">Nama Lengkap Anak</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('balita_name') is-invalid @enderror" type="text"
                                    placeholder="Masukkan Nama Ayah Balita" id="balita_name" name="balita_name">
                                @error('balita_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="father_name" class="form-control-label">Nama Ayah</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('father_name') is-invalid @enderror" type="text"
                                    placeholder="Masukkan Nama Ayah Balita" id="father_name" name="father_name">
                                @error('father_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="mother_name" class="form-control-label">Nama Ibu</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('mother_name') is-invalid @enderror" type="text"
                                    placeholder="Masukkan Nama Ibu Balita" id="mother_name" name="mother_name">
                                @error('mother_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="address" class="form-control-label">Alamat</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                                    placeholder="Masukkan Alamat Tinggal Balita" id="address" cols="30"
                                    rows="5"></textarea>
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="telp_numb" class="form-control-label">No. Telepon</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input class="form-control @error('telp_numb') is-invalid @enderror" type="tel"
                                    placeholder="Masukkan No Telepon Orang Tua" id="telp_numb" name="telp_numb">
                                @error('telp_numb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="city_born" class="form-control-label">Tempat Lahir</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('city_born') is-invalid @enderror" type="text"
                                    min="0" placeholder="Masukkan Tempat(Kota) Balita dilahirkan" id="city_born"
                                    name="city_born">
                                @error('city_born')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12">
                                <label for="date_born" class="form-control-label">Tanggal Lahir</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('date_born') is-invalid @enderror" type="date"
                                    placeholder="Masukkan Tanggal Lahir Balita" id="date_born" name="date_born">
                                @error('date_born')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12  d-flex align-items-center">
                                <label for="gender" class="form-control-label">Jenis Kelamin Balita</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <select required class="form-control @error('gender') is-invalid @enderror" id="gender"
                                    name="gender">
                                    <option value="" disabled selected>Pilih Jenis Kelamin Balita</option>
                                    <option value="L">Laki Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="age" class="form-control-label">Umur</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('age') is-invalid @enderror" type="number" min="0"
                                    placeholder="Masukkan Usia Balita (bulan)" id="age" name="age">
                                @error('age')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="last_weight" class="form-control-label">Berat Badan Terakhir</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('last_weight') is-invalid @enderror" type="number"
                                    min="0" placeholder="Masukkan Berat Badan Terakhir Balita" id="last_weight" step=".01"
                                    name="last_weight">
                                @error('last_weight')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="last_height" class="form-control-label">Tinggi Badan Terakhir</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('last_height') is-invalid @enderror" type="number"
                                    min="0" placeholder="Masukkan Tinggi Badan Terakhir Balita" id="last_height" step=".01"
                                    name="last_height">
                                @error('last_height')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="gizi_score" class="form-control-label">Nilai Gizi</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('gizi_score') is-invalid @enderror" type="number"
                                    min="0" placeholder="Nilai Gizi Terakhir Balita" id="gizi_score" step=".01"
                                    name="gizi_score" readonly>
                                @error('gizi_score')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                                <label for="gizi_status" class="form-control-label">Status Gizi Terakhir</label>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input required class="form-control @error('gizi_status') is-invalid @enderror" type="text"
                                    readonly placeholder="Status Gizi Terakhir Balita" id="gizi_status" name="gizi_status">
                                @error('gizi_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="btn-container d-flex justify-content-md-end justify-content-center">
                            <button type="submit" class="btn btn-primary align-right mb-4">Input Data</button>
                        </div>
                    </form>
                @endif
            @endcan
            @can('admin')
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Grafik Umur</h6>
                                <h2 class="text-white mb-0">Jumlah Anak di Posyandu Margorejo</h2>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-gizi" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
        {{-- <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>
    {{-- <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page visits</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Page name</th>
                                    <th scope="col">Visitors</th>
                                    <th scope="col">Unique users</th>
                                    <th scope="col">Bounce rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        /argon/
                                    </th>
                                    <td>
                                        4,569
                                    </td>
                                    <td>
                                        340
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/index.html
                                    </th>
                                    <td>
                                        3,985
                                    </td>
                                    <td>
                                        319
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/charts.html
                                    </th>
                                    <td>
                                        3,513
                                    </td>
                                    <td>
                                        294
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/tables.html
                                    </th>
                                    <td>
                                        2,050
                                    </td>
                                    <td>
                                        147
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/profile.html
                                    </th>
                                    <td>
                                        1,795
                                    </td>
                                    <td>
                                        190
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Social traffic</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Referral</th>
                                    <th scope="col">Visitors</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        Facebook
                                    </th>
                                    <td>
                                        1,480
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Facebook
                                    </th>
                                    <td>
                                        5,480
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">70%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar"
                                                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 70%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Google
                                    </th>
                                    <td>
                                        4,807
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">80%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-primary" role="progressbar"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 80%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Instagram
                                    </th>
                                    <td>
                                        3,678
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">75%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar"
                                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 75%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        twitter
                                    </th>
                                    <td>
                                        2,645
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">30%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-warning" role="progressbar"
                                                        aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 30%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}

    @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="/js/calculate.js"></script>
    <script>
        let dataUmur = {{ json_encode($dataUmur) }};
    </script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    {{-- <script src="/js/chart.js"></script> --}}
@endpush
