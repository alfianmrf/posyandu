@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-12">
                <h1 class="text-center text-white">AGENDA</h1>
                <h2 class="text-center text-white">Posyandu Margorejo</h1>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center text-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Tanggal Kegiatan</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Deskripsi Kegiatan</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr>
                        <td>
                            Lorem Ipsum
                        </td>
                        <td>
                            Lorem Ipsum
                        </td>
                        <td>
                            Lorem Ipsum
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>

<div class="container mt--10 pb-5"></div>
@endsection