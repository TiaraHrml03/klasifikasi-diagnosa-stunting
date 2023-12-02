<?php

namespace App\Http\Controllers;

use App\Jobs\DataBayiJob;
use App\Models\DataBalita;
use Illuminate\Http\Request;

class DataBalitaController extends Controller
{

    public function index()
    {
        $databalita = DataBalita::paginate('20');
        return view('data_balita.index', compact('databalita'));
    }


    public function create()
    {
        return view('data_balita.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jk' => 'required',
            'umur' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'status' => 'required',
        ]);
        
        $input = DataBalita::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'status' => $request->status,
        ]);
        if ($input) {
            return redirect()->route('balita.index')->with('pesan', 'Data berhasil disimpan');
        } else {
            echo "<script>
            alert('Data gagal diinput, masukkan kembali data dengan benar');
            window.location = '" . route('balita.index') . "';
            </script>";
        }
    }

    public function massUploadForm()
    {
        return view('data_balita.bulk');
    }

    public function massUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-data-bayi.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $filename);
            DataBayiJob::dispatch($filename);
            return redirect()->back()->with(['success' => 'Import Data Bayi Dijadwalkan!']);
        }
    }

    public function edit($balita_id)
    {
        $databalita = DataBalita::find($balita_id);
        return view('data_balita.edit', compact('databalita'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:200|unique:nama,jk,umur,berat_badan,tinggi_badan,status,' . $id
        ]);

        $data = DataBalita::find($id);
        $data->update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'status' => $request->status,
        ]);


        return redirect(route('balita.index'))->with('pesan', 'Data berhasil diupdate');
    }

    public function destroy(Request $req)
    {
        $databalita = DataBalita::findOrFail($req->id);
        $databalita->delete();
        return json_encode([
            'status' => 'success'
        ]);
        // return redirect()->route('data_balita')->with('success', 'Data Balita berhasil dihapus');
    }
}
