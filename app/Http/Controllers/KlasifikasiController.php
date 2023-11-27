<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\DataBalita;
use Illuminate\Http\Request;
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

        $status = $this->klasifikasi($request->jk, $request->umur, $request->berat_badan, $request->tinggi_badan);

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


    private function klasifikasi($jk, $umur, $berat_badan, $tinggi_badan)
    {
        $input = [
            "jk" => $jk,
            "umur" => $umur,
            "berat_badan" => $berat_badan,
            "tinggi_badan" => $tinggi_badan,
        ];

        $kriteria = [
            "jk",
            "umur",
            "berat_badan",
            "tinggi_badan"
        ];

        $hasil = "status";
        $hasil_value = ["NORMAL", "STUNTING"];

        $data_train_normal = [];
        foreach (DataBalita::all() as $value) {
            $data = [];
            $data['jk'] = $value->jk;
            $data['umur'] = $value->umur;
            $data['berat_badan'] = $value->berat_badan;
            $data['tinggi_badan'] = $value->tinggi_badan;
            $data['status'] = $value->status;
            $data_train_normal[] = $data;
        }

        $prob_true = [];
        $prob_false = [];
        foreach ($kriteria as $key => $value) {
            $prob_true[] = $this->getProbabilities($data_train_normal, [
                $value => $input[$value],
                $hasil => $hasil_value[1]
            ]);

            $prob_false[] = $this->getProbabilities($data_train_normal, [
                $value => $input[$value],
                $hasil => $hasil_value[0]
            ]);
        }

        $prob_hasil_true = $this->getProbabilities($data_train_normal, [
            $hasil => $hasil_value[1]
        ]);

        $prob_hasil_false = $this->getProbabilities($data_train_normal, [
            $hasil => $hasil_value[0]
        ]);

        $hasil = [
            number_format(array_product($prob_true) * $prob_hasil_true, 10),
            number_format(array_product($prob_false) * $prob_hasil_false, 10)
        ];

        Log::debug('Hasil = ', $hasil);
        $status = ($hasil[0] >= $hasil[1]) ? $hasil_value[1] : $hasil_value[0];
        
        return $status;
    }

    /**
     * $data - data balita normal,
     * $rules - data yang akan diuji
     */
    private function getProbabilities($data, $rules)
    {
        $hasil = 0;
        foreach ($data as $v) {
            $iya = 0;
            foreach ($rules as $y => $value) {
                if ($v[$y] == $value) $iya += 1;
                else $iya -= 1;
            }
            $hasil += ($iya == count($rules)) ? 1 : 0;
        }
        Log::debug($rules);
        Log::debug($hasil);
        return $hasil / count($data);
    }
}
