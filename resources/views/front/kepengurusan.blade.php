@extends('partials.front')
@section('title', 'Kepengurusan')
@section('content')

<!-- ======= Banner Section ======= -->
<section class="page-banner" style="position: relative; height: 100vh; background: url('{{ asset('asset/img/bnnr9.png') }}') center center no-repeat; background-size: cover;">
    <div class="overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white text-center fw-bold display-3" style="z-index: 2; position: relative; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
            Kepengurusan
        </h1>
        <a href="#main" class="scroll-down-icon" style="position: absolute; bottom: 30px; z-index: 2; text-decoration: none;">
            <i class="fas fa-chevron-down" style="font-size: 2rem; color: white; animation: bounce 2s infinite;"></i>
        </a>
    </div>
</section>

<style>
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
<!-- ======= End Banner Section ======= -->

    <main id="main">

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>Kepengurusan</p>
                </header>

                <div class="row gy-4">
    @foreach ($managements as $management)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
                <div class="member-img" style="width: 100%; aspect-ratio: 1 / 1; overflow: hidden;">
                    <img src="{{ asset('storage/' . $management->photo) }}" 
                         style="width: 100%; height: 100%; object-fit: cover;" 
                         alt="{{ $management->name }}">
                </div>     
                <style>
                    .social {
                        background: linear-gradient(135deg, #e0f2fe, #f3e8ff);
                        padding: 20px;
                        border-radius: 20px;
                        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                        text-align: center;
                        max-width: 100%; /* ubah dari 300px */
                        margin: 0; /* hilangkan auto centering */
                        flex: 1; /* biar fleksibel lebar dengan sisa ruang */
                    }
                    .social hr {
                        border: none;
                        border-top: 3px solid #60a5fa;
                        width: 50px;
                        margin: 0 auto 15px auto;
                    }
                    .social p:first-of-type {
                        font-size: 1.5rem;
                        font-weight: bold;
                        color: #1e40af !important;
                    }
                    .social p:last-of-type {
                        font-size: 1rem;
                        color: #7e22ce !important;
                    }
                </style>
                    <div class="social m-0">
                        <hr>
                        <p><b>{{ $management->name }}</b></p>
                        <p>{{ $management->position }}</p>
                    </div>
            </div>
        </div>
    @endforeach
</div>

            </div>
        </section>
        <!-- End Team Section -->
        </main><!-- End #main -->
@endsection