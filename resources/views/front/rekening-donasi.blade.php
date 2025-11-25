@extends('partials.front')
@section('title', 'rekening donasi')
@section('content')
<main id="main">

<!-- ======= Banner Section ======= -->
<section class="page-banner" style="position: relative; height: 100vh; background: url('{{ asset('asset/img/mccbg.png') }}') center center no-repeat; background-size: cover;">
    <div class="overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white text-center fw-bold display-3" style="z-index: 2; position: relative; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
            Rekening Donasi
        </h1>
        <a href="#rekening" class="scroll-down-icon" style="position: absolute; bottom: 30px; z-index: 2; text-decoration: none;">
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

.bank-card {
    background: linear-gradient(145deg, #ffffff, #f0f0f0);
    border-radius: 15px;
    padding: 20px 25px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.bank-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

.bank-name {
    font-weight: 600;
    color: #2a4d69;
}

.bank-number {
    font-size: 1.2rem;
    color: #444;
}

.qr-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.1);
    padding: 20px;
    transition: 0.3s ease;
}

.qr-card:hover {
    transform: scale(1.03);
}

.styled-accordion {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.accordion-box {
    background: linear-gradient(145deg, #ffffff, #f0f0f0);
    border-radius: 15px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}

.accordion-title {
    padding: 18px 24px;
    font-weight: 600;
    font-size: 1.1rem;
    color: #2a4d69;
    cursor: pointer;
    user-select: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background 0.3s ease;
}

.accordion-title:hover {
    background-color: #f9f9f9;
}

.accordion-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease, padding 0.3s ease;
    padding: 0 24px;
    font-size: 0.95rem;
    color: #333;
}

.accordion-content.open {
    padding: 16px 24px 20px;
    max-height: 500px;
}

.arrow {
    font-size: 1rem;
    transition: transform 0.3s ease;
}

.arrow.rotate {
    transform: rotate(180deg);
}
</style>

<!-- ======= Rekening & QR Section ======= -->
<section id="rekening" class="my-5">
    <div class="container" data-aos="fade-up">
        <header class="section-header mb-5">
            <p class="fs-2 fw-bold text-center" style="color: #2a4d69;">Informasi Rekening</p>
        </header>

        <div class="row g-4">
            <!-- Kolom Kiri: Daftar Rekening -->
            <div class="col-md-5">
                <div class="d-flex flex-column gap-3">
                    <div class="bank-card">
                        <div class="bank-name">Nama Bank</div>
                        <div class="bank-number">BNI</div>
                    </div>
                    <div class="bank-card">
                        <div class="bank-name">No Rekening</div>
                        <div class="bank-number">0698573352</div>
                    </div>
                    <div class="bank-card">
                        <div class="bank-name">Nama Rekening</div>
                        <div class="bank-number">Panti Asuhan Muhammadiyah Darul Istiqomah</div>
                    </div>
                </div>
            </div>


        <!-- Accordion Start -->
        <div class="styled-accordion mt-5">
            <div class="accordion-box">
                <header class="section-header mb-5">
                  <p class="fs-2 fw-bold text-center" style="color: #2a4d69;">Langkah-langkah melakukan donasi</p>
                </header>
                <div class="accordion-title">
                    <span>Langkah Pertama</span>
                    <span class="arrow">&#9660;</span>
                </div>
                <div class="accordion-content">
                    <p>Anda bisa melakukan doansi terlebih dahulu dan donasi bisa melakukan transfer pada rekening bank yang sudah tertera pada menu rekening donasi</p>
                </div>
            </div>
            <div class="accordion-box">
                <div class="accordion-title">
                    <span>Langkah Kedua</span>
                    <span class="arrow">&#9660;</span>
                </div>
                <div class="accordion-content">
                    <p>Pergi ke bagian from donasi, isikan data diri anda dan nominal donasi yang akan anda donasikan. Lalu klik konfirmasi</p>
                    <img src="{{ asset('/asset/img/contoh_donasi.png') }}" alt="Rekening Donasi" style="max-width:100%; height:auto; margin-top:10px;">
                </div>
            </div>
            <div class="accordion-box">
                <div class="accordion-title">
                    <span>Langkah Ketiga</span>
                    <span class="arrow">&#9660;</span>
                </div>
                <div class="accordion-content">
                    <p>Setelah anda menekan  konfirmasi, anda akan diarahkan ke bagian konfirmasi donasi, di menu ini anda akan diminta mengirim bukti transfer.</p>
                    <img src="{{ asset('/asset/img/contoh_donasi2.png') }}" alt="Rekening Donasi" style="max-width:100%; height:auto; margin-top:10px;">
                </div>
            </div>
            <div class="accordion-box">
                <div class="accordion-title">
                    <span>Langkah Keempat</span>
                    <span class="arrow">&#9660;</span>
                </div>
                <div class="accordion-content">
                    <p>Setelah melakukan semua langkah-langkah sebelumnya, nama anda akan otomatis muncul di bagian/menu laporan donasi</p>
                    <img src="{{ asset('/asset/img/contoh_donasi3.png') }}" alt="Rekening Donasi" style="max-width:100%; height:auto; margin-top:10px;">
                </div>
            </div>
        </div>
        <!-- Accordion End -->

    </div>
</section>

</main>

<script>
document.querySelectorAll('.accordion-title').forEach(header => {
    header.addEventListener('click', () => {
        const content = header.nextElementSibling;
        const arrow = header.querySelector('.arrow');
        content.classList.toggle('open');
        arrow.classList.toggle('rotate');
    });
});
</script>
@endsection
