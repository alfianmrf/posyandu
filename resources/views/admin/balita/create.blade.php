@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h1 mb-0 text-gray-800">Tambah Data Pengguna</h1>
                </div>
                <form method="post" action="/balita" class="mb-5" enctype="multipart/form-data">
                    @csrf
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
                            <textarea required class="form-control @error('address') is-invalid @enderror" name="address"
                                placeholder="Masukkan Alamat Tinggal Balita" id="address" cols="30" rows="5"></textarea>
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
                            <input required class="form-control @error('telp_numb') is-invalid @enderror" type="tel"
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
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection


@push('js')
    <script src="/js/calculate.js"></script>
@endpush
