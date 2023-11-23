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
                    <select name="jk" class="form-control 
                    @error('jk') is invalid @enderror form-select form-select-lg mb-3" aria-label="Default select example" required>
                        <option selected disabled>--</option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Umur</label>
                    <select name="umur" class="form-control
                    @error('umur') is invalid @enderror form-select form-select-lg mb-3" aria-label="Default select example" required>
                        <option selected disabled>--</option>
                        <option value="Bayi">Bayi</option>
                        <option value="Anak">Anak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Berat Badan</label>
                    <select name="berat_badan" class="form-control
                    @error('berat_badan') is invalid @enderror form-select form-select-lg mb-3" aria-label="Default select example" required>
                        <option selected disabled>--</option>
                        <option value="Rendah">Rendah</option>
                        <option value="Normal">Normal</option>
                        <option value="Lebih">Lebih</option>
                    </select>  
                </div>

                <div class="form-group">
                    <label>Tinggi Badan</label>
                    <select name="tinggi_badan" class="form-control
                    @error('tinggi_badan') is invalid @enderror form-select form-select-lg mb-3" aria-label="Default select example" required>
                        <option selected disabled>--</option>
                        <option value="Pendek">Pendek</option>
                        <option value="Normal">Normal</option>
                        <option value="Tinggi">Tinggi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control
                    @error('status') is invalid @enderror form-select form-select-lg mb-3" aria-label="Default select example" required>
                        <option selected disabled>--</option>    
                        <option value="Normal">Normal</option>
                        <option value="Stunting">Stunting</option>
                    </select>
                </div>

                <div class="form-group">
                    {{-- <a href="{{ route(balita) }}" class="btn btn-primary btn-sm">Kembali</a> --}}
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </div>
    </form>
            
@endsection