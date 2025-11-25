 @extends('partials.front')
@section('title', 'Tentang Kami')
@section('content')

<!-- ======= Banner Section ======= -->
<section class="page-banner" style="position: relative; height: 100vh; background: url('{{ asset('asset/img/mccbg.png') }}') center center no-repeat; background-size: cover;">
    <div class="overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white text-center fw-bold display-3" style="z-index: 2; position: relative; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
            Kontak
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
 
 <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>Hubungi Kami</p>
                </header>
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <a href="https://maps.app.goo.gl/MYjkBpsUfdULZTor8" target="_blank" class="text-danger text-decoration-none">
                                        <i class="bi bi-geo-alt"></i>
                                    </a>
                                    <h3>Alamat</h3>
                                    <p>Jl. Raya Pasirian No.88, Kec. Pasirian, Kabupaten Lumajang, Jawa Timur</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info-box">
                                    <a href="https://wa.me/qr/" target="_blank" class="text-success text-decoration-none">
                                        <i class="bi bi-telephone"></i>
                                    </a>
                                <h3>Hubungi Kami</h3>
                                <p>0857-7123-8693</p>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email</h3>
                                    <p>pasdarulistiqomah@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>Jam Buka</h3>
                                    <p>Setiap Hari<br />09.00 - 16.00 WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="map-box">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d305.0312089129604!2d113.11613496227187!3d-8.206651559552046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd66983f69f79f1%3A0x3b54857f8b23510a!2sPanti%20Asuhan%20Putri%20Muhammadiyah%20Darul%20Istiqomah%20(LKSA%20Putri%20Muhammadiyah)!5e0!3m2!1sid!2sid!4v1744529342887!5m2!1sid!2sid" 
                                width="100%" 
                                height="450" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>

                            {{-- <form action="forms/contact.php" method="post" class="php-email-form mt-4">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" required />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required />
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="subjek" placeholder="Subjek" required />
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="Pesan" rows="6" placeholder="Pesan" required></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div class="loading">Memuat...</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Pesan Anda telah dikirim. Terima kasih!</div>
                                        <button type="submit">Mengirim pesan</button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        
        <!-- End Contact Section -->

        @endsection