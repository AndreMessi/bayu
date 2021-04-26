@extends('partials.layout')
@section('content')
    <div class="container">
        <section class="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/dist/img/wisata1_Sembalun.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <a href="{{route('pages.paket')}}" class="btn btn-warning">View Details</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('assets/dist/img/wisata2_gili.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <a href="{{route('pages.paket')}}" class="btn btn-warning">View Details</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('assets/dist/img/wisata3.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <a href="{{route('pages.paket')}}" class="btn btn-warning">View Details</a>
                </div>
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        </section>
        <section class="content mt-2">
        <div class="row">
            <div class="col-md-6">
            <div class="blog-post">
                <div class="blog-thumb">
                <img src="{{asset('assets/dist/img/banner.jpg')}}" alt="" style="height: 400px; width:540px;">
                </div>
                <div class="down-content mt-3">
                <a href="#">
                    <h4>Gili Trawangan</h4>
                </a>
                <p style="text-align: justify;">
                    Gili Trawangan memiliki kekayaan alam dasar laut yang memukau. Mulai dari terumbu karang yang beraneka
                    warna, hingga beragam jenis ikan unik bisa dijumpai dalam perairan ini. Keindahan alam bawah laut itu
                    pula yang membuat banyak wisatawan ingin memenuhi hasrat untuk snorkeling atau diving.

                    Untuk diving, memang sedikit lebih sulit sebab kamu harus bisa berenang dan memiliki sertifikat. Akan
                    tetapi, untuk sekadar snorkeling, siapa saja bebas melakukan aktivitas seru ini. Jika tak punya
                    perlengkapan snorkeling, kamu bisa menyewa milik warga dengan harga terjangkau.

                    Kamu bisa langsung berenang dan melihat dengan jelas barisan ikan dan binatang laut lainnya yang unik.
                    Jangan lupa untuk membawa kamera dalam air, sehingga keindahan tersebut dapat kamu abadikan sebagai
                    kenangan.
                </p>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="blog-post">
                <div class="blog-thumb">
                <img src="{{asset('assets/dist/img/rinjani.jpeg')}}" alt="" style="height: 400px; width:540px;">
                </div>
                <div class="down-content mt-3">
                <a href="#">
                    <h4>Gunung Rinjani</h4>
                </a>
                <p style="text-align: justify;">
                    Anda pecinta alam dan penikmat gunung? Belum lengkap rasanya jika Anda belum merasakan sensasi mendaki
                    di gunung yang terkenal sangat cantik akan pesona alamnya ini. Dengan ketinggian 3.726 mdpl dan terletak
                    di utara Pulau Lombok, Gunung Rinjani merupakan gunung berapi kedua tertinggi di Indonesia. Masuk dalam
                    kawasan Taman Nasional Gunung Rinjani dan dikelilingi oleh hutan dan semak belukar seluas 76.000 hektar
                    merupakan pemandangan yang asri bagi Gunung Rinjani.

                    Akses menuju Pulau Lombok selain dapat ditempuh melalui jalur darat menggunakan bus langsung Jakarta –
                    Mataram dengan menyeberang menggunakan kapal ferry dua kali (Selat Bali dan Selat Lombok), juga dapat
                    ditempuh dengan menggunakan pesawat terbang.
                </p>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
@endsection
