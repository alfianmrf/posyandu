@extends('layouts.home', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="row my-5">
                @foreach ($artikels as $artikel)
                    <div class="col-sm col-md-4">
                        <a href="{{ $artikel['link'] }}" class="">
                            <img src="{{ URL::to('img/artikel/' . $artikel['img']) }}" alt="First image"
                                class="img-thumbnail">
                            <h4 class="text-white text-center mt-3 mb-5">{{ $artikel['judul'] }}</h4>
                        </a>
                    </div>
                @endforeach
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
