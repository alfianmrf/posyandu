@extends('layouts.home', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-posyandu pt-7 pb-7">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-12">
                    <h1 class="text-center text-white">AGENDA</h1>
                    <h2 class="text-center text-white">Posyandu Margorejo</h1>
                </div>
            </div>
            <div class="card bg-gradient-secodary shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <div>
                            <table class="table align-items-center" id="dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">Tanggal Kegiatan</th>
                                        <th scope="col" class="sort" data-sort="budget">Nama Kegiatan</th>
                                        <th scope="col" class="sort" data-sort="status">Deskripsi Kegiatan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @if ($agendas)
                                        @foreach ($agendas as $agenda)
                                            <tr>
                                                <th scope="row">
                                                    {{ $agenda->agenda_date }}
                                                </th>
                                                <td class="budget">
                                                    {{ $agenda->agenda_name }}
                                                </td>
                                                <td class="budget">
                                                    {{ $agenda->description }}
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
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
