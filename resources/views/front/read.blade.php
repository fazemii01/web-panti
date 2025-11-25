@extends('partials.front')
@section('title', 'Read Article')
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

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">
                            <h2 class="entry-title">
                                <a href="#">{{ $data->judul }}</a>
                            </h2>

                            <div class="entry-meta">
                                @php
                                    $dateString = $data->tanggal;
                                    $tanggal = strftime('%d %B %Y', strtotime($dateString));
                                @endphp
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="blog-single.html">{{ $data->penulis }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time
                                                datetime="2020-01-01">{{ $tanggal }}</time></a></li>
                                </ul>
                            </div>
                            <div id="share"></div>
                            <div class="entry-content">
                                <img src="{{ asset('images/blog/' . $data->file) }}" style="width: 100%;height:100%"
                                    class="img-fluid" alt="">
                                <p>
                                    {!! $data->konten !!}
                                </p>
                            </div>
                        </article><!-- End blog entry -->
                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">
                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                @forelse ($recent as $item)
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('images/blog/' . $item->file) }}" alt="">
                                        <h4><a href="{{ $item->slug }}">{{ $item->judul }}</a></h4>
                                        <time datetime="">{{ $item->created_at->diffForhumans() }}</time>
                                    </div>
                                @empty
                                    <div class="alert alert-primary" role="alert">
                                        article not available
                                    </div>
                                @endforelse
                            </div><!-- End sidebar recent posts-->
                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->
@endsection
