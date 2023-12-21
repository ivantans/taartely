@extends("layouts.main")
@section('container')
<section class="bg-jumbotron">
    <div class="row justify-content-between container-mx-7-rem py-5">
        <div class="d-flex align-items-center col-lg-6">
            <div>
                <h1 class="taartely-title">Selamat Datang di Toko Kami!!!</h1>
                <p class="taartely-title1">Mau Beli Kue Apa Hari ini?</p>
                <button class="btn fw-semibold mt-4 taartely-button1 mb-3"><a class="nav-link" href="/products">Pesan Sekarang!</a></button>
            </div>
        </div>
        <img src="{{ asset("/storage/taartely-assets/KUE.png") }}" alt="" class="img-fluid" style="width:450px; height:376px;">
    </div>
</section>

{{-- TODO: REFACTOR CODE: AMBIL DATA DARI CONTROLLER --}}   
<section class="container-mx-7-rem pt-4 pb-5">
    <h1 class="text-center mb-2 taartely-color-2 fw-bold">Kue terlaris</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4 mt-2 mb-4 text-center">
        <a class="text-decoration-none d-flex" href="">
            <div class="col">
                <div class="card h-100 py-4">
                    <img src="{{ asset("/storage/taartely-assets/kue1.png") }}" class="card-img-top zoom" alt="...">
                    <div class="card-body">
                        <h5 class="fw-semibold taartely-color-3 card-title mt-2">Kue Hitam</h5>
                        <p class="taartely-paragraph card-text">Kue hitam dengan nuansa elegan, cocok untuk kamu cewek dan cowok mamba.</p>
                    </div>
                </div>
            </div>
        </a>
        <a class="text-decoration-none d-flex" href="">
            <div class="col">
                <div class="card h-100 py-4">
                    <img src="{{ asset("/storage/taartely-assets/kue2.png") }}" class="card-img-top zoom" alt="...">
                    <div class="card-body">
                        <h5 class="fw-semibold taartely-color-3 card-title mt-2">Kue Biru</h5>
                        <p class="taartely-paragraph card-text">Kue Biru yang kece parah, warna biru gelap cocok untuk kamu yang suka dengan lautan.</p>
                    </div>
                </div>
            </div>
        </a>
        <a class="text-decoration-none d-flex" href="">
            <div class="col">
                <div class="card h-100 py-4">
                    <img src="{{ asset("/storage/taartely-assets/kue4.png") }}" class="card-img-top zoom" alt="...">
                    <div class="card-body">
                        <h5 class="fw-semibold taartely-color-3 card-title mt-2">Kue Bola</h5>
                        <p class="taartely-paragraph card-text">Kue dengan tema sepak bola, cocok untuk kamu calon pemain timnas Indonesia.</p>
                    </div>
                </div>
            </div>
        </a>
        <a class="text-decoration-none d-flex" href="">
            <div class="col">
                <div class="card h-100 py-4">
                    <img src="{{ asset("/storage/taartely-assets/kue3.png") }}" class="card-img-top zoom" alt="...">
                    <div class="card-body">
                        <h5 class="fw-semibold taartely-color-3 card-title mt-2">Kue Putih</h5>
                        <p class="taartely-paragraph card-text">Kue putih yang simpel dengan sedikit warna biru, kue ini cocok untuk kamu yang misterius.</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>

{{-- * Section Visi misi taartely --}}
<section class="bg-section text-center py-5" data-aos="fade-down">
    <div class="container-mx-7-rem">
        <div class="d-flex flex-column mb-3">
            <div class="d-flex justify-content-center pb-5">
                <div class="col-md-4">
                    <img src="{{ asset("/storage/taartely-assets/logotaartely.png") }}" alt="taartelylogo" class="img-fluid">
                </div>
            </div>
            <div class="d-flex justify-content-center pb-3">
                <div class="col-md-6">
                    <p class="taartely-paragraph">Menjadi toko kue yang mampu berbagi kebahagiaan bersama pelanggan dengan menyediakan produk kue dan roti yang sesuai dengan kebutuhan konsumen</p>
                </div>
            </div>
          </div>
    </div>
{{-- * End section visi misi taartely --}}
</section>



<div class="row d-flex justify-content-between container-mx-7-rem py-5">
    <div class="col-md-6 d-flex align-items-center">
        <div data-aos="fade-right">
            <h1 class="taartely-color-2 fw-bold pb-2">Tentang kami</h1>
            <p class="taartely-paragraph align">Taartely adalah usaha produktif yang dimiliki oleh perorangan dan berlokasi di Yogyakarta. Hadir sejak tahun 2022, Taartely berfokus di bidang makanan, secara spesifik yaitu kue, yang dibuat berdasarkan permintaan pembeli. Kue yang dimaksud ialah kue ulang tahun yang tampilannya disesuaikan dengan keinginan pembeli sehingga memungkinkan adanya diskusi antara penjual dan pembeli terkait desain serta komponen penyusun kue. Taartely tidak hanya menyediakan kue custom, tetapi juga makanan penutup seperti puding dan roti-roti kecil. Sejauh ini, Taartely belum memiliki toko sehingga masih bersifat made by order dan bisa dikatakan homemade. Hal ini dapat dikatakan wajar mengingat Taartely berawal dari sebuah usaha kecil dan hingga kini pun masih terus berkembang sebagai UMKM. </p>
        </div>
    </div>
    <div class="col-md-6" data-aos="fade-left">
        <div class="d-flex justify-content-end">
        <img src="{{ asset("/storage/taartely-assets/kue5.png") }}" alt="" class="img-fluid" style="width: 400px">
    </div>
    </div>
</div>


<section class="bg-section" data-aos="fade-down">
    <div class="row justify-content-between  container-mx-7-rem py-5">
        <div class="col-lg-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.06264476014394!2d110.35298920525514!3d-7.789577738062974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5818ed6301bf%3A0x8f0377f72b38f5ed!2sJl.%20Indraprasta%20No.9b!5e0!3m2!1sid!2sid!4v1700932580802!5m2!1sid!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
                </iframe>
        </div>
        <div class="col-lg-5 text-center d-flex align-items-center mt-3">
            <div>
                <h1 class="taartely-color-1 fw-bold"><i></i> Lokasi kami</h1>
                <img src="{{ asset("/storage/taartely-assets/lokasi.png") }}" alt="" class="img-fluid" style="width:300px;"">
                <p class="taartely-paragraph zoom">Jl. Indraprasta No.9b, Tegalrejo, Kec. Tegalrejo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55244</p>
            </div>
        </div>
    </div>

</section>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>


@endsection
