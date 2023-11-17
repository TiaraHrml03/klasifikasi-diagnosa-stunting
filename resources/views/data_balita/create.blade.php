@extends('layout.app')
@section('title', 'Tambah Data Balita')

@section('content')

    <form action="{{ route('balita.simpan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" class="form-control
                    @error('nama') is invalid @enderror" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input name="jk" class="form-control 
                    @error('jk') is invalid @enderror" required>
                </div>

                <div class="form-group">
                    <label>Umur</label>
                    <input name="umur" class="form-control
                    @error('umur') is invalid @enderror" required>
                </div>

                <div class="form-group">
                    <label>Berat Badan</label>
                    <input name="berat_badan" class="form-control
                    @error('berat_badan') is invalid @enderror" required>
                </div>

                <div class="form-group">
                    <label>Tinggi Badan</label>
                    <input name="tinggi_badan" class="form-control
                    @error('tinggi_badan') is invalid @enderror" required>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input name="status" class="form-control
                    @error('status') is invalid @enderror" required>
                </div>

                <div class="form-group">
                    {{-- <a href="{{ route(balita) }}" class="btn btn-primary btn-sm">Kembali</a> --}}
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </div>
    </form>
            
@endsection