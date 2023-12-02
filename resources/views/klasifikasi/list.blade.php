@extends('layouts.app')
@section('title', 'List Klasifikasi')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Daftar Klasifikasi</li>
    </ol>
    <div class="col-lg-12 margin-tb">
        <a href="{{ route('klasifikasi') }}" class="btn btn-primary btn-sm">Buat Klasifikasi</a><br><br>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Klasifikasi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Berat Badan</th>
                                <th scope="col">Tinggi Badan</th>
                                <th scope="col">Status</th>
                                {{-- <th scope="col">Timestamp</th> --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>{{ ($data->currentpage() - 1) * $data->perPage() + $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jk }}</td>
                                    <td>{{ $item->umur }}</td>
                                    <td>{{ $item->berat_badan }}</td>
                                    <td>{{ $item->tinggi_badan }}</td>
                                    <td>{{ $item->status }}</td>
                                    {{-- <td>{{ date('d F Y H:i A', strtotime($item->updated_at)) }}</td> --}}
                                    <td>
                                        {{-- <a href="{{ route('balita.edit', ['balita_id' => $item->id]) }}"
                                            class="btn btn-success btn-sm">Edit</a> --}}
                                        <button onclick="destroy({{ $item->id }})"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                                <script>
                                    function destroy(id) {

                                        console.log(id);

                                        if (confirm('Anda yakin ingin menghapus data?')) {
                                            $.ajax({
                                                type: 'delete',
                                                url: "{{ route('balita.destroy', ['balita_id' => ' . id . ']) }}",
                                                data: {
                                                    "_token": "{{ csrf_token() }}",
                                                    "id": id,
                                                },
                                                success: function(response) {
                                                    $(`tr[data-id=${id}]`).remove();
                                                    window.location?.reload()
                                                }
                                            });
                                        }
                                    }
                                </script>
                                {{-- <tr>
                                <td>
                                    <span><a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i
                                                class="fa fa-pencil color-muted"></i> </a><a
                                            href="javascript:void()" data-toggle="tooltip"
                                            data-placement="top" title="Close"><i
                                                class="fa fa-close color-danger"></i></a></span>
                                </td>
                            </tr> --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {!! $data->links() !!}
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
