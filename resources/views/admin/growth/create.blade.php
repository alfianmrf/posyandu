@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h1 mb-0 text-gray-800">Tambah Data Perkembangan Balita</h1>
                </div>
                <form method="post" action="/growth" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="balita_id" value="{{ $balita_id }}">

                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12">
                            <label for="control_date" class="form-control-label">Tanggal Ke Posyandu</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input required class="form-control @error('control_date') is-invalid @enderror" type="date"
                                placeholder="Masukkan Tanggal Lahir Balita" id="control_date" name="control_date">
                            @error('control_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
                                name="weight">
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
                                name="height">
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
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection


@push('js')
    <script src="/js/calculate.js"></script>
@endpush
