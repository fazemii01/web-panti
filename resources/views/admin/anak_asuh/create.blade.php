@extends('partials.admin')
@section('title', 'Create Content')
@section('main')
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block card mb-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title border-bottom pb-2 mb-2">
                                <h4 class="mb-0">Data Anak Asuh </h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('anak_asuh.index') }}"><i
                                            class="ph ph-house"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Add New Data</li>
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
                        <form action="{{ route('anak_asuh.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama" class="mb-2">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir" class="mb-2">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir">
                            </div>
                            <div class="form-group">
                            <label for="jenis_kelamin" class="mb-2">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="mukim_nonmukim" class="form-label">Status Mukim</label>
                                <select name="mukim_nonmukim" id="mukim_nonmukim" class="form-control" required>
                                    <option value="mukim" {{ old('mukim_nonmukim', $anak_asuh->mukim_nonmukim ?? '') == 'mukim' ? 'selected' : '' }}>Mukim</option>
                                    <option value="non-mukim" {{ old('mukim_nonmukim', $anak_asuh->mukim_nonmukim ?? '') == 'non-mukim' ? 'selected' : '' }}>Non-Mukim</option>
                                </select>
                            </div>
                            
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
@endsection