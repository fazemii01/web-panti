@extends('partials.front')
@section('title', 'Galeri')
@section('content')

<!-- ======= Banner Section ======= -->
<section class="page-banner" style="position: relative; height: 100vh; background: url('{{ asset('asset/img/mccbg.png') }}') center center no-repeat; background-size: cover;">
    <div class="overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white text-center fw-bold display-3" style="z-index: 2; position: relative; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
            Galeri
        </h1>
        <a href="#main" class="scroll-down-icon" style="position: absolute; bottom: 30px; z-index: 2; text-decoration: none;">
            <i class="fas fa-chevron-down" style="font-size: 2rem; color: white; animation: bounce 2s infinite;"></i>
        </a>
    </div>
</section>

<style>
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(10px); }
        60% { transform: translateY(5px); }
    }

    .card-img-top {
        height: 250px;
        object-fit: cover;
        object-position: center;
        transition: transform 0.3s ease;
        cursor: pointer;
        border-radius: 8px 8px 0 0;
    }

    .card-img-top:hover {
        transform: scale(1.03);
        filter: brightness(1.05);
    }

    .card {
        border: 1px solid #eee;
        background: #fefefe;
        transition: box-shadow 0.3s ease;
        border-radius: 12px;
    }

    .card:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        color: #2a4d69;
        font-weight: 600;
        margin-top: 10px;
    }

    .section-header p {
        font-size: 2rem;
        font-weight: 700;
        color: #2a4d69;
        margin-bottom: 30px;
    }

    .modal-img {
        width: 100%;
        object-fit: contain;
        max-height: 80vh;
        border-radius: 12px;
    }

    .modal-content {
        background: #f9f9f9;
        border-radius: 15px;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #2a4d69;
    }
</style>

<!-- ======= Galeri Section ======= -->
<main id="main" class="my-5">
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Galeri</p>
            </header>

            <div class="row">
                @forelse ($galleries as $item)
                    <div class="col-md-4 mb-4 d-flex">
                        <div class="card shadow-sm w-100">
                            <img 
                                src="{{ asset('storage/' . $item->image) }}" 
                                class="card-img-top"
                                alt="{{ $item->title }}"
                                data-bs-toggle="modal"
                                data-bs-target="#modalGaleri"
                                data-title="{{ $item->title }}"
                                data-img="{{ asset('storage/' . $item->image) }}"
                            >
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $item->title }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada foto galeri.</p>
                @endforelse
            </div>
        </div>
    </section>
</main>

<!-- Modal -->
<div class="modal fade" id="modalGaleri" tabindex="-1" aria-labelledby="modalGaleriLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="modal-body text-center">
        <img src="" id="modalImage" class="modal-img mb-3" alt="">
        <h5 id="modalTitle" class="modal-title text-center"></h5>
      </div>
    </div>
  </div>
</div>

<!-- JS for Modal -->
<script>
    const modalGaleri = document.getElementById('modalGaleri');
    modalGaleri.addEventListener('show.bs.modal', function (event) {
        const triggerImage = event.relatedTarget;
        const title = triggerImage.getAttribute('data-title');
        const img = triggerImage.getAttribute('data-img');

        document.getElementById('modalImage').src = img;
        document.getElementById('modalTitle').textContent = title;
    });
</script>

@endsection
