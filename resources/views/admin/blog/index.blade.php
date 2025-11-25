@extends('partials.admin')
@section('title', 'Blog')
@section('main')
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block card mb-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title border-bottom pb-2 mb-2">
                                <h4 class="mb-0">Konten Blog</h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ph ph-house"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Konten</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->penulis }}</td>
                                        <td><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#show{{ $item->id }}">{!! Str::limit(strip_tags($item['konten']), 50, '...') !!}</a></td>
                                        </td>
                                        <td>
                                            <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-primary btn-sm"
                                                title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('blog.destroy', $item->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit"><i
                                                        class="fa-solid fa-delete-left "></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
    @foreach ($data as $item)
        <!-- Modal -->
        <div class="modal fade" id="show{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Show Blog</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="#">{{ $item->judul }}</a>
                            </h2>

                            <div class="entry-meta">
                                @php
                                    $dateString = $item->tanggal;
                                    $tanggal = strftime('%d %B %Y', strtotime($dateString));
                                @endphp
                                <div class="d-flex gap-2">
                                    <p><i class="fa-solid fa-user me-2"></i>{{ $item->penulis }}</p>
                                    <p><i class="fa-solid fa-calendar-days me-2"></i>{{ $tanggal }}</p>
                                </div>
                            </div>
                            <div id="share"></div>
                            <div class="entry-content">
                                <img src="{{ asset('images/blog/' . $item->file) }}" style="width: 100%;height:100%"
                                    class="img-fluid" alt="">
                                <p>
                                    {!! $item->konten !!}
                                </p>
                            </div>
                        </article><!-- End blog entry -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
