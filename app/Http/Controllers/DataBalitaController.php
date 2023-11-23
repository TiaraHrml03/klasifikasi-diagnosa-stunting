<?php

namespace App\Http\Controllers;

use App\Models\DataBalita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DataBalitaController extends Controller
{
    
    public function index()
    {
        // $databalita = DataBalita::paginate('20');
        $databalita = DataBalita::all();
        return view('data_balita.index', compact('databalita'));
    }

    
    public function create()
    {
        return view('data_balita.create');
    }

    public function store(Request $request)
    {
        $input = DataBalita::insert([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'status' => $request->status,
        ]);
        if ($input) {
            return redirect()->route('balita')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kembali data dengan benar');
            window.location = '" . route('balita') . "';
            </script>";
        }
    }

    // public function show(DataBalita $dataBalita)
    // {
    //     //
    // }

    public function edit(Request $req)
    {
        $databalita = DB::table('data_balita')
            ->where('id', $req->id)
            ->first();
            // dd($databalita);
        return view('data_balita.edit', compact('databalita'));
    }

    public function update(Request $request)
    {
        $update = DB::table('data_balita')
            ->where('id', $request->id)
            ->update([
                'nama' => $request->nama,
                'jk' => $request->jk,
                'umur' => $request->umur,
                'berat_badan' => $request->berat_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'status' => $request->status,
            ]);
        if ($update) {
            return redirect(route('balita'))->with('pesan', 'Data berhasil diupdate');
        } else {
            echo "<script>
            alert('Data gagal diupdate, masukkan kembali data dengan benar');
            window.location = '/data_balita.index';
            </script>";
        }
    }

    public function destroy(Request $req)
    {
        $databalita = DataBalita::findOrFail($req->id);
        $databalita->delete();
        return json_encode([
            'status' => 'success'
        ]);
        //return redirect()->route('data_balita')->with('success', 'Data Balita berhasil dihapus');
    }
}
