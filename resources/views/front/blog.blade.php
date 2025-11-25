@extends('partials.front')
@section('title', 'Blog')
@section('content')

<!-- ======= Banner Section ======= -->
<section class="page-banner" style="position: relative; height: 100vh; background: url('{{ asset('asset/img/mccbg.png') }}') center center no-repeat; background-size: cover;">
    <div class="overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white text-center fw-bold display-3" style="z-index: 2; position: relative; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
            Blog
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

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                <div class="row">
    @forelse ($data as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/blog/' . $item->file) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Blog image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text small text-muted mb-1">
                        <i class="bi bi-person"></i> {{ $item->penulis }} <br>
                        <i class="bi bi-clock"></i>
                        <time datetime="{{ $item->tanggal }}">{{ strftime('%d %B %Y', strtotime($item->tanggal)) }}</time>
                    </p>
                    <p class="card-text flex-grow-1">
                        {{ Str::limit(strip_tags($item->konten), 100, '...') }}
                    </p>
                    <a href="{{ url('read-blog/' . $item->slug) }}" class="btn btn-primary mt-auto">Read More</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-primary" role="alert">
                Tidak ada blog yang ditemukan.
            </div>
        </div>
    @endforelse
</div>
<!-- End blog entries list -->
                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection