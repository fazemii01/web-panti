@extends('partials.admin')
@section('title', 'Edit Content')
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
                                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}"><i
                                            class="ph ph-house"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit Blog</li>
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
                    <div class="card-body">
                        <form action="{{ route('blog.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="judul" class="mb-2">Judul</label>
                                <input type="text" class="form-control" name="judul" value="{{ $data->judul }}">
                            </div>
                            <div class="form-group">
                                <label for="penulis" class="mb-2">Penulis</label>
                                <input type="text" class="form-control" name="penulis"value="{{ $data->penulis }}">
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="mb-2">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="{{ $data->tanggal }}">
                            </div>
                            <div class="form-group">
                                <label for="konten" class="mb-2">Konten</label>
                                <input id="x" type="hidden" name="konten" value="{!! $data->konten !!}">
                                <trix-editor input="x"></trix-editor>
                            </div>
                            <div class="form-group">
                                <label for="file"class="mb-3">Foto</label>
                                <input type="file" class="form-control" id="image-input" accept="image/*" name="file">
                            </div>
                            <img id="image-preview" src="" class="rounded" alt="Image Preview"
                                style="display:none; width: 200px; height: auto;" />
                            <div class="form-group mt-3">
                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
    <script>
        document.getElementById('image-input').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgElement = document.createElement("img");
                    imgElement.src = event.target.result;
                    imgElement.onload = function(e) {
                        const canvas = document.createElement("canvas");
                        const MAX_WIDTH = 800;

                        const scaleSize = MAX_WIDTH / e.target.width;
                        canvas.width = MAX_WIDTH;
                        canvas.height = e.target.height * scaleSize;

                        const ctx = canvas.getContext("2d");
                        ctx.drawImage(e.target, 0, 0, canvas.width, canvas.height);

                        const srcEncoded = ctx.canvas.toDataURL(e.target, "image/jpeg");

                        // Tampilkan gambar
                        document.getElementById('image-preview').src = srcEncoded;
                        document.getElementById('image-preview').style.display = 'block';
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
