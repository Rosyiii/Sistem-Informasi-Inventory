<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stok;
use App\Models\Supplier;

class StokController extends Controller
{
    public function index()
    {
        return view('data_stok', [
            "tittle" => "Data Stok",
            "stoks" => Stok::oldest()->filter(request(['id_stok', 'id_supplier', 'nama_supplier']))->paginate(10)
        ]);
    }

    public function show(Stok $id_stok){
        return view('detail_stok', [
            "tittle" => "Detail Stok",
            "result" => $id_stok
        ]);
    }

    public function edit(Stok $id_stok){
        return view('edit_stok', [
            "tittle" => "Edit Stok",
            "result" => $id_stok
        ]);
    }

    public function update(Request $request, Stok $id_stok)
    {
        $rules = [
            'id_stok' => 'required|exists:stoks,id_stok',
            'id_supplier' => 'required|exists:suppliers,id_supplier',
            'jml_stok' => 'required',
            'satuan' => 'required|max:255',
            'harga_beli' => 'required',
            'biaya_pesan' => 'required',
            'waktu_antar' => 'required',
            'biaya_simpan' => 'required'
        ];

        if ($request->nama != $id_stok->nama){
            $rules['nama'] = ['required', 'unique:stoks,nama', 'max:255'];
        }

        $validatedData = $request->validate($rules);

        Stok::where('id_stok', $id_stok->id_stok)->update($validatedData);

        return redirect('/data_stok')->with('message', 'Data Stok Berhasil Di Perbarui!!');
    }
}
