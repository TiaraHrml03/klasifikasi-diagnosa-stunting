@extends('layout.app')
@section('title', 'Klasifikasi')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Klasifikasi Diagnosa Stunting</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('klasifikasiaksi') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Nama</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="nama">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="jk">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Umur</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="umur">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Berat Badan</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="berat_badan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Tinggi Badan</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="tinggi_badan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary">Proses</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Favicon icon -->
<link rel="icon" type="../assets/image/png" sizes="16x16" href="../assets/images/favicon.png">
<!-- Custom Stylesheet -->
<link href="../assets/css/style.css" rel="stylesheet">

<!-- Required vendors -->
<script src="./assets/vendor/global/global.min.js"></script>
<script src="./assets/js/quixnav-init.js"></script>
<script src="./assets/js/custom.min.js"></script>

@endsection