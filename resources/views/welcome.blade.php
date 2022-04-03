@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://puskesmasdemak1.com/storage/2021/01/Hero-Banner-Placeholder-Light-1024x480-1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://puskesmasdemak1.com/storage/2021/01/Hero-Banner-Placeholder-Light-1024x480-1.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://puskesmasdemak1.com/storage/2021/01/Hero-Banner-Placeholder-Light-1024x480-1.png" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-12">
                <p class="text-white text-justify">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio sapien, egestas imperdiet vestibulum non, dictum et magna. Pellentesque pretium id augue quis sodales. Suspendisse rhoncus arcu lacus, et commodo orci varius nec. Maecenas non diam nisl. Proin cursus vitae lectus sit amet commodo. Fusce porttitor quis orci sit amet tempus. Quisque egestas, ipsum a molestie pretium, orci justo pharetra turpis, non interdum quam tortor ut felis. In mattis condimentum elementum. Sed semper felis ac orci porta accumsan. Ut eu massa arcu. Aenean arcu velit, tincidunt nec ligula id, volutpat ultrices dolor. Morbi a cursus magna, sed finibus purus.') }}</p>
                <p class="text-white text-justify">{{ __('Maecenas malesuada orci eu accumsan venenatis. Morbi pulvinar augue eget metus viverra ultricies. Nam commodo eu justo id condimentum. Maecenas a magna iaculis erat vulputate porta nec et quam. Nunc laoreet nunc at sem finibus laoreet. Vestibulum elit tortor, condimentum ac congue eget, euismod ac velit. Sed vel urna et nunc porta faucibus.') }}</p>
                <p class="text-white text-justify">{{ __('Vestibulum at eros sit amet lorem egestas egestas eu et tellus. Suspendisse ac tempor nunc. Vestibulum ut facilisis quam. Vestibulum laoreet sodales diam, nec fermentum justo vehicula ac. Donec iaculis maximus felis sed gravida. Maecenas eget ultrices dui. Ut id vehicula magna, ac condimentum dui. Morbi posuere tristique arcu in condimentum.') }}</p>
            </div>
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