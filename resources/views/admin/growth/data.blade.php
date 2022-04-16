@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h1 mb-0 text-gray-800">Data Perkembangan Balita </h1>
            @can('admin')
                <a href="{{ route('growth.create', $balita_id) }}"
                    class="d-none d-sm-inline-block btn btn-primary shadow px-3 py-2"><i
                        class="fas fa-plus fa-sm text-white-100 mr-2"></i>Tambah</a>
            @endcan
        </div>
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-secodary shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                <table class="table align-items-center" id="dataTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Tanggal</th>
                                            <th scope="col" class="sort" data-sort="budget">Umur</th>
                                            <th scope="col" class="sort" data-sort="status">Berat Badan</th>
                                            <th scope="col" class="sort" data-sort="status">Tinggi Badan</th>
                                            <th scope="col" class="sort" data-sort="status">Status Gizi</th>
                                            @can('admin')
                                                <th scope="col">Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @if ($dataGrowths)
                                            @foreach ($dataGrowths as $growth)
                                                <tr>
                                                    <th scope="row">
                                                        {{ date('d-m-Y', strtotime($growth->control_date)) }}
                                                    </th>
                                                    <td class="">
                                                        {{ $growth->age }}
                                                    </td>
                                                    <td class="">
                                                        {{ $growth->weight }}
                                                    </td>
                                                    <td class="">
                                                        {{ $growth->height }}
                                                    </td>
                                                    <td class="">
                                                        {{ $growth->gizi_score }} - {{ $growth->gizi_status }}
                                                    </td>
                                                    @can('admin')
                                                        <td class="text-center">
                                                            <a class="btn btn-warning"
                                                                href="{{ route('growth.edit', $growth->id) }}">Edit</a>
                                                            <form action="/growth/{{ $growth->id }}" method="post"
                                                                class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-danger border-0" type="submit"
                                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                                            </form>
                                                        </td>
                                                    @endcan
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

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
