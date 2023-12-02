<?php

namespace App\Http\Controllers;

use App\Classes\NaiveBayes;
use App\Models\Klasifikasi;
use App\Models\DataBalita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\map;

class KlasifikasiController extends Controller
{

    public function index()
    {
        return view('klasifikasi.index');
    }

    public function list()
    {
        $data = Klasifikasi::paginate(20);
        return view('klasifikasi.list', compact('data'));
    }


    public function klasifikasiaksi(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jk' => 'required',
            'umur' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
        ]);

        $naiveBayes = new NaiveBayes();
        $status = $naiveBayes->klasifikasi($request->jk, $request->umur, $request->berat_badan, $request->tinggi_badan);

        $data = Klasifikasi::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'status' => $status
        ]);


        // session(['nama' => $request->nama]);

        if ($data) {
            return redirect()->route('klasifikasi.list')->with('pesan', 'data berhasil ditambahkan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kembali data dengan benar');
            window.location = '/';
            </script>";
        }
    }
}
