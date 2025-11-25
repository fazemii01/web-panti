@extends('partials.front')
@section('title', 'Muhammadiyyah Centre Chidren')
@section('content')

<script>
    document.querySelector('.btn-get-started').addEventListener('click', function(e) {
        e.preventDefault(); // Mencegah reload halaman
        document.querySelector('#about').scrollIntoView({ behavior: 'smooth' });
    });
</script>


<div class="scroll-wrapper">

    <!-- ======= Hero Section ======= -->
   <!-- Bagian Hero -->
   <section id="hero" class="hero d-flex align-items-center">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('/asset/img/bnnr4.png') }}" class="d-block w-100" alt="Slide 1">
        <div class="carousel-caption d-none d-md-block">
          <h5>Selamat Datang</h5>
          <p>Bersama membangun masyarakat generasi penerus yang lebih baik</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/asset/img/bnnr6.png') }}" class="d-block w-100" alt="Slide 2">
        <div class="carousel-caption d-none d-md-block">
          <h5>Kepedulian untuk Generasi Masa Depan</h5>
          <p>Bersama Muhammadiyah Children Center Pasirian</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Scroll Icon -->
    <a href="#bnnr1" class="scroll-down" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 2;">
        <i class="fas fa-chevron-down fa-2x" style="color: white; animation: bounce 2s infinite;"></i>
    </a>
</section>

</section>

    <!-- End Hero -->

<style>
   /* Hero Carousel Fullscreen */
#hero {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
}

#hero .carousel-inner {
    height: 100%;
}

#hero .carousel-item {
    height: 100%;
}

#hero .carousel-item img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    object-position: center;
}

/* Optional: posisi teks caption */
.carousel-caption {
    bottom: 20%;
    z-index: 2;
}

/* Tombol scroll */
.btn-get-started {
    display: inline-block;
    padding: 10px 25px;
    background: #ff6600;
    color: white;
    font-size: 18px;
    text-decoration: none;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-get-started:hover {
    background: #cc5500;
}

#hero .hero-content {
    text-align: center;
    color: #fff;
    position: relative;
    z-index: 2;
}

#hero .carousel-container {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 0 15px;
}
    
    /* Overlay */
    #hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }
    
    /* Konten Hero */
    .hero-content {
        position: relative;
        z-index: 2;
        color: white;
        text-align: center;
    }
    
    /* Tombol */
    .btn-get-started {
        display: inline-block;
        padding: 10px 25px;
        background: #ff6600;
        color: white;
        font-size: 18px;
        text-decoration: none;
        border-radius: 5px;
        transition: 0.3s;
    }
    
    .btn-get-started:hover {
        background: #cc5500;
    }
    
    /* About Section */
    .about-section {
        padding: 100px 0;
        text-align: center;
    }

    .scroll-wrapper {
    height: 100vh;
    overflow-y: scroll;
    scroll-snap-type: y mandatory;
    scroll-behavior: smooth;
}

.scroll-wrapper section {
    scroll-snap-align: start;
    height: 100vh;
    width: 100%;
    position: relative;
}
.scroll-wrapper {
    height: 100vh;
    overflow-y: scroll;
    scroll-snap-type: y mandatory;
    scroll-behavior: smooth;

    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE 10+ */
}
.scroll-wrapper::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}

    /* Scroll Down Animation */
@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0); 
  }
  40% {
    transform: translateY(10px); 
  }
  60% {
    transform: translateY(5px); 
  }
}
    </style>

<!-- ======= Informasi Section ======= -->
<section id='bnnr1' class="info-section position-relative" style="background: url('{{ asset('asset/img/bnnr17.jpg') }}') center center / cover no-repeat; height: 100vh; color: white;">
    <div class="overlay" style="position:absolute; top:0; left:0; right:0; bottom:0; background-color: rgba(0,0,0,0.6); z-index:1;"></div>
    
    <div class="container h-100 d-flex align-items-center" style="position: relative; z-index: 2;">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="fw-bold mb-3">Tentang Kami</h1>
                <p class="lead">Rangkaian informasi terkait visi, misi dan sejarah panti asuhan Muhammadiyah Center Children Putri cabang Pasirian</p>
                <a href="{{ url('/tentang-kami') }}" class="btn btn-success me-2 mt-3">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Scroll Icon -->
    <a href="#bnnr2" class="scroll-down" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 2;">
        <i class="fas fa-chevron-down fa-2x" style="color: white; animation: bounce 2s infinite;"></i>
    </a>
</section>
<section id='bnnr1' class="info-section position-relative" style="background: url('{{ asset('asset/img/bnnr18.jpg') }}') center center / cover no-repeat; height: 100vh; color: white;">
    <div class="overlay" style="position:absolute; top:0; left:0; right:0; bottom:0; background-color: rgba(0,0,0,0.6); z-index:1;"></div>
    
    <div class="container h-100 d-flex align-items-center" style="position: relative; z-index: 2;">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="fw-bold mb-3">Berita MCC</h1>
                <p class="lead">Rangkaian informasi dan kegiatan seputar Muhammadiyyah Children Centre Pasirian serta aktivitas sosial dan pendidikan yang berdampak untuk generasi masa depan.</p>
                <a href="{{ route('show-blog') }}" class="btn btn-success me-2 mt-3">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

</section>



</div>
    <!-- End #main -->
@endsection
