@extends('layout.app')
@section('title', 'Data Balita')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Edit Data Balita</li>
    </ol>
    <form action="{{ route('balita.update', ['balita_id' => $databalita->id]) }}" method="POST" enctype="multipart/form-data">
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
                    <input name="jk" class="form-control" value="{{ $databalita->jk }}">
                </div>

                <div class="form-group">
                    <label>Umur</label>
                    <input name="umur" class="form-control" value="{{ $databalita->umur }}">
                </div>

                <div class="form-group">
                    <label>Berat Badan</label>
                    <input name="berat_badan" class="form-control" value="{{ $databalita->berat_badan }}">
                </div>

                <div class="form-group">
                    <label>Tinggi Badan</label>
                    <input name="tinggi_badan" class="form-control" value="{{ $databalita->tinggi_badan }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input name="status" class="form-control" value="{{ $databalita->status }}">
                </div>

                <div class="form-group">
                    <a href="{{ route('balita.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection
