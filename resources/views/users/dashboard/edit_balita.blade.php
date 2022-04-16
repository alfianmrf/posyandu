@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <form method="post" action="/balita/{{ $balita->id }}/update" class="mb-5"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="balita_id" value="{{ $balita->id }}">
                    <input type="hidden" name="growth_id" value="{{ $growth->id }}">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12 d-flex align-items-center">
                            <label for="no_kms" class="form-control-label">No KMS</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input required class="form-control @error('no_kms') is-invalid @enderror" type="text"
                                placeholder="Masukkan No KMS Balita" id="no_kms" name="no_kms"
                                value="{{ old('no_kms', $balita->no_kms) }}">
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
                                placeholder="Masukkan Nama Ayah Balita" id="balita_name" name="balita_name"
                                value="{{ old('balita_name', $balita->balita_name) }}">
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
                                placeholder="Masukkan Nama Ayah Balita" id="father_name" name="father_name"
                                value="{{ old('father_name', $balita->father_name) }}">
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
                                placeholder="Masukkan Nama Ibu Balita" id="mother_name" name="mother_name"
                                value="{{ old('mother_name', $balita->mother_name) }}">
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
                                rows="5">{{ old('address', $balita->address) }}</textarea>
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
                                placeholder="Masukkan No Telepon Orang Tua" id="telp_numb" name="telp_numb"
                                value="{{ old('telp_numb', $balita->telp_numb) }}">
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
                                name="city_born" value="{{ old('city_born', $balita->city_born) }}">
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
                                placeholder="Masukkan Tanggal Lahir Balita" id="date_born" name="date_born"
                                value="{{ old('date_born', date('Y-m-d', strtotime($balita->date_born))) }}">
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
                                @foreach ($gender as $key => $value)
                                    <option @if ($key == $balita->gender) required @endif value="{{ $key }}">
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12 d-flex align-items-center">
                            <label for="age" class="form-control-label">Umur</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input required class="form-control @error('age') is-invalid @enderror" type="number" min="0"
                                placeholder="Masukkan Usia Balita (bulan)" id="age" name="age"
                                value="{{ old('age', $growth->age) }}">
                            @error('age')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12 d-flex align-items-center">
                            <label for="weight" class="form-control-label">Berat Badan Terakhir</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input required class="form-control @error('weight') is-invalid @enderror" type="number"
                                min="0" placeholder="Masukkan Berat Badan Terakhir Balita" id="last_weight" step=".01"
                                name="weight" value="{{ old('weight', $growth->weight) }}">
                            @error('weight')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12 d-flex align-items-center">
                            <label for="height" class="form-control-label">Tinggi Badan Terakhir</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input required class="form-control @error('height') is-invalid @enderror" type="number"
                                min="0" placeholder="Masukkan Tinggi Badan Terakhir Balita" id="last_height" step=".01"
                                name="height" value="{{ old('height', $growth->height) }}">
                            @error('height')
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
                                name="gizi_score" readonly value="{{ old('gizi_score', $growth->gizi_score) }}">
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
                                readonly placeholder="Status Gizi Terakhir Balita" id="gizi_status" name="gizi_status"
                                value="{{ old('gizi_status', $growth->gizi_status) }}">
                            @error('gizi_status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="btn-container d-flex justify-content-md-end justify-content-center">
                        <button type="submit" class="btn btn-primary align-right mb-4">Ubah Data</button>
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
