@extends('layout.app')
@section('title', 'Edit Data Balita')

@section('content')

    <form action="{{ route('balita.update', ['id' => $databalita->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="content">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" class="form-control" value="{{ $databalita->nama }}">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control form-select form-select-lg mb-3" aria-label="Default select example" value="{{ $databalita->jk }}">
                        <option selected disabled>--</option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Umur</label>
                    <select name="umur" class="form-control form-select form-select-lg mb-3" aria-label="Default select example" value="{{ $databalita->umur }}">
                        <option selected disabled>--</option>
                        <option value="Bayi">Bayi</option>
                        <option value="Anak">Anak</option>
                    </select>  
                </div>

                <div class="form-group">
                    <label>Berat Badan</label>
                    <select name="berat_badan" class="form-control form-select form-select-lg mb-3" aria-label="Default select example" value="{{ $databalita->berat_badan }}">
                        <option selected disabled>--</option>
                        <option value="Rendah">Rendah</option>
                        <option value="Normal">Normal</option>
                        <option value="Lebih">Lebih</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tinggi Badan</label>
                    <select name="tinggi_badan" class="form-control form-select form-select-lg mb-3" aria-label="Default select example" value="{{ $databalita->tinggi_badan }}">
                        <option selected disabled>--</option>
                        <option value="Pendek">Pendek</option>
                        <option value="Normal">Normal</option>
                        <option value="Tinggi">Tinggi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control form-select form-select-lg mb-3" aria-label="Default select example" value="{{ $databalita->status }}">
                        <option selected disabled>--</option>
                        <option value="Normal">Normal</option>
                        <option value="Stunting">Stunting</option>
                    </select>
                </div>

                <div class="form-group">
                    <a href="{{ route('balita') }}" class="btn btn-primary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </form>

@endsection