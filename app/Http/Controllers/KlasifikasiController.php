<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class KlasifikasiController extends Controller
{

    public function index()
    {
        return view('klasifikasi.index');
    }


    public function klasifikasiaksi(Request $request)
    {
        $input = DB::table('data_testing')->insert(
            [
                'nama' => $request->nama,
                'jk' => $request->jk,
                'umur' => $request->umur,
                'berat_badan' => $request->berat_badan,
                'tinggi_badan' => $request->tinggi_badan,
            ]
        );
        session(['nama' => $request->nama]);
        if ($input == true) {
            echo "<script>
            window.location = 'klasifikasi';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kembali data dengan benar');
            window.location = '/';
            </script>";
        }
    }


    public function klasifikasi()
    {
        $data = DB::table('data_testing')->where(['nama' => session()->get('nama')])->first();
        // dd($data);

        $input = [
            "jk" => $data->jk,
            "umur" => $this->clasifyUMUR($data->umur),
            "berat_badan" => $this->clasifyBB($data->berat_badan),
            "tinggi_badan" => $this->clasifyTB($data->tinggi_badan),
        ];

        $table_data_balita = "data_balita";

        $kriteria = [
            "jk",
            "umur",
            "berat_badan",
            "tinggi_badan"
        ];

        $hasil = "keterangan";
        $hasil_value = ["Normal", "Stunting"];

        $select = implode(',', [...$kriteria, $hasil]);
        $data_balita = DB::table($table_data_balita)->selectRaw($select)->get();

        $data_balita_normal = [];
        foreach ($data_balita as $key => $value) {
            $value->umur = $this->clasifyUMUR($value->umur);
            $value->berat_badan = $this->clasifyBB($value->berat_badan);
            $value->tinggi_badan = $this->clasifyTB($value->tinggi_badan);
            $data_balita_normal[] = $value;
        }

        $prob_true = [];
        $prob_false = [];
        foreach ($kriteria as $key =>$value) {
            $prob_true[] = $this->getProbabilities($data_balita_normal, [
                $value => $input[$value],
                $hasil => $hasil_value[1]
            ]) / count($data_balita_normal);

            $prob_false[] = $this->getProbabilities($data_balita_normal, [
                $value => $input[$value],
                $hasil => $hasil_value[0]
            ]) / count($data_balita_normal);
        }

        $prob_hasil_true = $this->getProbabilities($data_balita_normal, [
            $hasil => $hasil_value[1]
        ]) / count($data_balita_normal);

        $prob_hasil_false = $this->getProbabilities($data_balita_normal, [
            $hasil => $hasil_value[0]
        ]) / count($data_balita_normal);

        $hasil = [
            number_format(array_product($prob_true) * $prob_hasil_true, 10),
            number_format(array_product($prob_false) * $prob_hasil_false, 10)
        ];

        return view('klasifikasi.index', compact('hasil'));

    }

    private function clasifyUMUR($value)
    {
        if($value < 12){
            return "bayi";
        }else if($value > 12){
            return "anak";
        }
        return "no clasify";
        // if ($value < 12) return "Bayi";
        // if ($value > 12) return "Anak";
    }

    private function clasifyBB($value)
    {
        if($value < 2.5){
            return "rendah";
        }
        else if($value >= 2.5  && $value <=4){
            return "normal";
        }
        return "lebih";
        // if ($value < 2.5) return "Rendah";
        // if ($value < 4) return "Normal";
        // if ($value > 4) return "Lebih";
    }

    private function clasifyTB($value)
    {
        if($value < 85){
            return "pendek";
        }
        else if($value >= 85 && $value <=110){
            return "normal";
        }
        return "Tinggi";
        // if ($value < 85) return "Pendek";
        // if ($value < 110) return "Normal";
        // if ($value > 110) return "Tinggi";
    }

    private function getProbabilities($data, $rules)
    {
        $hasil = 0;
        foreach ($data as $x => $v) {
            $iya = 0;
            foreach ($rules as $y => $value) {
                if ($v-$y == $value) $iya += 1;
                else $iya -= 1;
            }
            $hasil += ($iya == count($rules)) ? 1 : 0;
        }
        return $hasil;
    }


    public function show(Klasifikasi $klasifikasi)
    {
        //
    }

    
    public function edit(Klasifikasi $klasifikasi)
    {
        //
    }

    
    public function update(Request $request, Klasifikasi $klasifikasi)
    {
        //
    }

    
    public function destroy(Klasifikasi $klasifikasi)
    {
        //
    }
}
