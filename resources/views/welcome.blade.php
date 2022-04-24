@extends('layouts.home', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-posyandu pt-9 pb-7">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="carousel-inner">
                            {{-- <div class="carousel-item h-100 active">
                                <img class="d-block h-100" src="<?= URL::to('/img/welcome-slider/1.jpg') ?>" alt="First slide">
                            </div>
                            <div class="carousel-item h-100">
                                <img class="d-block h-100" src="<?= URL::to('/img/welcome-slider/2.jpg') ?>" alt="Second slide">
                            </div> --}}
                            {{-- <div class="carousel-item active">
                                <img class="d-block w-100 h-100" src="<?= URL::to('/img/welcome-slider/1-1.jpg') ?>"
                                    alt="Third slide">
                            </div> --}}
                            <div class="carousel-item active">
                                <img class="d-block w-100 h-100" src="<?= URL::to('/img/welcome-slider/2_rev.jpg') ?>"
                                    alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100" src="<?= URL::to('/img/welcome-slider/3_rev.jpg') ?>"
                                    alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100" src="<?= URL::to('/img/welcome-slider/4_rev.jpg') ?>"
                                    alt="Forth slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100" src="<?= URL::to('/img/welcome-slider/5_rev.jpeg') ?>"
                                    alt="Fifth slide">
                            </div>
                            {{-- <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="https://puskesmasdemak1.com/storage/2021/01/Hero-Banner-Placeholder-Light-1024x480-1.png"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="https://puskesmasdemak1.com/storage/2021/01/Hero-Banner-Placeholder-Light-1024x480-1.png"
                                    alt="Third slide">
                            </div> --}}
                        </div>
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
                <div class="col-md-6">
                    <p class="text-white font-weight-normal text-justify">
                        Posyandu adalah wadah pemeliharaan kesehatan yang dilakukan dari, oleh dan untuk masyarakat yang
                        dibimbing petugas terkait. (Departemen Kesehatan RI. 2006).
                        Posyandu adalah pusat kegiatan masyarakat dalam upaya pelayanan kesehatan dan keluarga
                        berencana.(Effendi, Nasrul. 1998: 267).
                    </p>
                    <p class="text-white font-weight-normal text-justify">
                        Tujuan posyandu antara lain: Menurunkan angka kematian bayi (AKB), angka kematian ibu (ibu hamil),
                        melahirkan dan nifas, Membudayakan NKBS,
                        Meningkatkan peran serta masyarakat untuk mengembangkan kegiatan kesehatan dan KB serta kegiatan
                        lainnya yang menunjang untuk tercapainya masyarakat sehat sejahtera serta
                        Berfungsi sebagai wahana gerakan reproduksi keluarga sejahtera, gerakan ketahanan keluarga dan
                        gerakan ekonomi keluarga sejahtera.
                        (Bagian Kependudukan dan Biostatistik FKM USU. 2007).
                    </p>
                    <p class="text-white font-weight-normal text-justify">
                        Kegiatan Pokok Posyandu: KIA, KB, Imunisasi, Gizi, Penanggulangan diare (Bagian Kependudukan dan
                        Biostatistik FKM USU. 2007).
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="text-white font-weight-normal text-justify">
                        Pelaksanaan Layanan Posyandu <br>
                        Pada hari buka posyandu dilakukan pelayanan masyarakat dengan sistem 5 meja yaitu:
                    </p>
                    <ul class="list-unstyled text-white text-justify">
                        <li>Meja I : Pendaftaran</li>
                        <li>Meja II : Penimbangan</li>
                        <li>Meja III : Pengisian KMS</li>
                        <li>Meja IV : Penyuluhan perorangan berdasarkan KMS</li>
                        <li>Meja V : Pelayanan kesehatan berupa: Imunisasi, Pemberian vitamin A dosis tinggi, Pembagian pil
                            KB atau kondom, Pengobatan ringan, Konsultasi KB.</li>
                    </ul>
                    <p class="text-white font-weight-normal text-justify">
                        Petugas pada meja I dan IV dilaksanakan oleh kader PKK sedangkan meja V merupakan meja pelayanan
                        medis.(Bagian Kependudukan dan Biostatistik FKM USU. 2007)
                    </p>
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
