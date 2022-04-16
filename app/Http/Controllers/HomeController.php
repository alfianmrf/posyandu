<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

class HomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function agenda()
    {
        $data = [
            'agendas' => Agenda::all()
        ];
        return view('agenda', $data);
    }

    public function artikel()
    {
        $artikels = [
            [
                'judul' => 'Makan Sehat',
                'img'   => '1.jpg',
                'link'  => 'https://www.halodoc.com/kesehatan/makanan-sehat'
            ],
            [
                'judul' => 'Tak Cuma Wortel Ini Makanan Lain Yang Membuat Mata Sehat',
                'img'   => '2.jpeg',
                'link'  => 'https://www.halodoc.com/artikel/tak-cuma-wortel-ini-makanan-lain-yang-membuat-mata-sehat'
            ],
            [
                'judul' => 'Ini Manfaat Minyak Wijen Untuk Kesehatan',
                'img'   => '3.jpg',
                'link'  => 'https://www.sehatq.com/artikel/sering-dipakai-dalam-masakan-ini-manfaat-minyak-wijen-untuk-kesehatan'
            ],
            [
                'judul' => 'Makanan Sehat Alias Super Food dengan Manfaat Super',
                'img'   => '4.jpg',
                'link'  => 'https://www.sehatq.com/artikel/makanan-sehat-alias-superfood-dengan-manfaat-yang-super'
            ],
            [
                'judul' => 'Telur Rebus Bikin Gemuk Benarkah ?',
                'img'   => '5.jpg',
                'link'  => 'https://www.sehatq.com/artikel/telur-rebus-bikin-gemuk-benarkah'
            ],
            [
                'judul' => 'Bahaya Makan Tengah Malam dan Dampak Buruknya Terhadap Tubuh',
                'img'   => '6.jpg',
                'link'  => 'https://www.sehatq.com/artikel/7-bahaya-makan-tengah-malam-dan-dampak-buruknya-terhadap-tubuh'
            ],
            [
                'judul' => 'Basil adalah Penyedap Rasa Yang Kaya Manfaat',
                'img'   => '7.jpg',
                'link'  => 'https://www.sehatq.com/artikel/basil-adalah-penyedap-rasa-yang-kaya-manfaat'
            ],
            [
                'judul' => 'Cegah Obesitas Hingga Jaga Imunitas Berbagai Manfaar Jamur Shitake',
                'img'   => '8.jpg',
                'link'  => 'https://www.sehatq.com/artikel/cegah-obesitas-hingga-jaga-imunitas-nikmati-berbagai-manfaat-jamur-shitake-untuk-tubuh'
            ],
            [
                'judul' => 'Makanan Saat Haid Yang Bisa Dipilih',
                'img'   => '9.jpg',
                'link'  => 'https://www.sehatq.com/artikel/makanan-saat-haid-yang-bisa-dipilih-ketika-datang-bulan'
            ],
            [
                'judul' => 'Manfaat Daun Sirih dan Efek Sampingnya Untuk Kesehatan',
                'img'   => '10.jpg',
                'link'  => 'https://katadata.co.id/safrezi/berita/619f398722f6c/10-manfaat-daun-sirih-dan-efek-sampingnya-untuk-kesehatan'
            ],
            [
                'judul' => 'Manfaat Jus Buat Naga Untuk Kesehatan dan Cara Membuatnya',
                'img'   => '11.jpg',
                'link'  => 'https://katadata.co.id/iftitah/berita/61d541e82ddae/7-manfaat-jus-buah-naga-untuk-kesehatan-dan-cara-membuatnya'
            ],
            [
                'judul' => 'Bahaya dan Manfaat Telur Asin Yang Harus Diperhatikan',
                'img'   => '12.jpg',
                'link'  => 'https://www.honestdocs.id/bahaya-dan-manfaat-telur-asin-yang-harus-diperhatikan'
            ],
            [
                'judul' => 'Manfaat Susu Kambing Untuk Anak',
                'img'   => '13.jpg',
                'link'  => 'https://www.popmama.com/kid/1-3-years-old/bella-lesmana/manfaat-susu-kambing-untuk-anak/6'
            ],
            [
                'judul' => 'Cara Atasi Anak Yang Sulit Mengucapkan Kalimat dengan Jelas',
                'img'   => '14.jpg',
                'link'  => 'https://www.popmama.com/kid/4-5-years-old/jemima/cara-atasi-anak-yang-sulit-mengucapkan-kalimat-dengan-jelas'
            ],
            [
                'judul' => 'Manfaat Penting Bermain Stiker Pada Perkembagan Anak',
                'img'   => '15.jpg',
                'link'  => 'https://www.popmama.com/kid/1-3-years-old/jemima/manfaat-penting-bermain-stiker-pada-perkembangan-anak'
            ],
            [
                'judul' => 'Resep Milkshake dan Oat yang Kaya Manfaat dan Vitamin',
                'img'   => '16.jpg',
                'link'  => 'https://www.popmama.com/kid/1-3-years-old/jemima/resep-milshake-mangga-dan-oat-yang-kaya-manfaat-dan-vitamin'
            ],
            [
                'judul' => 'Apa Yang Terjadi Pada Tubuh Jika Rajin Jalan Kaki Tiap Hari',
                'img'   => '17.png',
                'link'  => 'http://p2ptm.kemkes.go.id/artikel-sehat/apa-yang-terjadi-pada-tubuh-jika-rajin-jalan-kaki-tiap-hari'
            ],

        ];

        $data = [
            'artikels' => $artikels
        ];
        return view('artikel', $data);
    }

    public function kontak()
    {
        return view('kontak');
    }
}
