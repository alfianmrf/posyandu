@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-10 mb-5 mb-xl-0">
                <form method="post" action="/agenda/{{ $agenda->id }}/update" class="mb-5"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12 d-flex align-items-center">
                            <label for="agenda_name" class="form-control-label">Nama Kegiatan</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input required class="form-control @error('agenda_name') is-invalid @enderror" type="text"
                                placeholder="Masukkan Nama Kegiatan" id="agenda_name" name="agenda_name"
                                value="{{ old('agenda_name', $agenda->agenda_name) }}">
                            @error('agenda_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12">
                            <label for="agenda_date" class="form-control-label">Tanggal Kegiatan</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input required class="form-control @error('agenda_date') is-invalid @enderror" type="date"
                                placeholder="Masukkan Tanggal Kegiatan" id="agenda_date" name="agenda_date"
                                value="{{ old('agenda_date', date('Y-m-d', strtotime($agenda->agenda_date))) }}">
                            @error('agenda_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4 col-md-12 d-flex align-items-center">
                            <label for="description" class="form-control-label">Deskripsi Agenda</label>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Deskripsi Kegiatan"
                                id="description"
                                name="description">{{ old('description', $agenda->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="btn-container d-flex justify-content-md-end justify-content-center">
                        <button type="submit" class="btn btn-primary align-right mb-4">Ubah Agenda</button>
                    </div>
                </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
