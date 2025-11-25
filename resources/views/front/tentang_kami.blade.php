@extends('partials.front')
@section('title', 'Tentang Kami')
@section('content')
<main id="main">

<!-- ======= Banner Section ======= -->
<section class="page-banner" style="position: relative; height: 100vh; background: url('{{ asset('asset/img/bnnr5.jpeg') }}') center center no-repeat; background-size: cover;">
    <div class="overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white text-center fw-bold display-1" style="z-index: 2; position: relative; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
            Tentang kami
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

.accordion-section-spacing {
    margin-bottom: 100px; /* Bisa disesuaikan */
}

</style>
<!-- ======= End Banner Section ======= -->

<!-- ======= Visi Misi Section ======= -->
 <!-- Accordion Start -->
    <!-- Accordion Start -->
<div class="container accordion-section-spacing" data-aos="fade-up">
    <div class="styled-accordion mt-5">
        <div class="accordion-box">
            <div class="accordion-title">
                <span>Visi</span>
                <span class="arrow">&#9660;</span>
            </div>
            <div class="accordion-content">
                <p>LKSA Putri Muhammadiyah “ Darul Istiqomah” Pasirian  “ Terbentuknya Muslimah yang berakhlaqul karimah, mandiri, trampil , cerdas ,berguna bagi bangs dan negara</p>
            </div>
        </div>
        <div class="accordion-box">
            <div class="accordion-title">
                <span>Misi</span>
                <span class="arrow">&#9660;</span>
            </div>
            <div class="accordion-content">
                <p>"Mengasuh dan mendidik anak yatim piatu , yatim , piatu,dan dhu’afa agar menjadi muslimah yang mandiri , trampil ,berdaya guna ,berakhlaq dan berakhidah islam bersumber pada Al’quran dan sunah Nabi Muhammad SAW".</p>
            </div>
        </div>
        <div class="accordion-box">
            <div class="accordion-title">
                <span>Sejarah</span>
                <span class="arrow">&#9660;</span>
            </div>
            <div class="accordion-content">
                <p>"Mengingat banyaknya anak yatim , piatu ,yatim piatu dan du’afa di daerah pasirian dan sekitarnya yang perlu untuk memperoleh bantuan dari kita bersama .  Maka Sejak pengalihan masjid Al Istiqomah ke Masjid Ar Rahma di Jalan raya Pasirian  , kami beritikat untuk memanfaatkan tanah wakaf dari Keluarga Bapak Totok Nurmadi seluas 225 m2 sebagai Panti Asuhan .Pengurus Cabang Muhammadiyah Pasirian  mulai memikirkan untuk dialihkan/digunakan sebagai Panti Asuhan .Dengan didasari permasalahan tersebut diatas maka dengan dorongan dan semangat yang tinggi dan hati yang ikhlas, Alhamdulillah pada tanggal 22 Mei 2016 H / 15 Sya’ban 1437 H  Pimpinan Cabang Muhammadiyah Pasirian berniat untuk mendirikanlah Panti Asuhan Muhammadiyah Darul Istiqomah  Kecamatan Pasirian  Kabupaten Lumajang Propinsi Jawa Timur".</p>
            </div>
        </div>
    </div>
</div>
<!-- Accordion End -->

    
    

        <!-- Accordion End -->
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
</section>
</main>
<!-- ======= End Visi Misi Section ======= -->

   
@endsection