<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        return view('data_supplier', [
            "tittle" => "Data Supplier",
            "suppliers" => Supplier::oldest()->filter(request(['id_supplier', 'nama_supplier']))->paginate(9)
        ]);
    }

    public function show(Supplier $id_supplier){
        return view('detail_supplier', [
            "tittle" => "Detail Supplier",
            "result" => $id_supplier
        ]);
    }

    public function edit(Supplier $id_supplier){
        return view('edit_supplier', [
            "tittle" => "Edit Supplier",
            "result" => $id_supplier
        ]);
    }

    public function tambahSupplier()
    {
        return view('tambah_supplier', [
            "tittle" => "Tambah Supplier"
        ]);
    }

    public function storeSupplier(Request $request)
    {
        $last_id = Supplier::orderBy('id_supplier', 'desc')->first()->id_supplier;
        $last_id = substr($last_id,3);
        $tambah = $last_id + 1;
        $id_supplier = "SS-".sprintf("%03d",$tambah);
        
        $validatedData = $request->validate([
            'nama' => ['required', 'max:255', 'unique:suppliers,nama'],
            'alamat' => 'required|max:255',
            'nama_cp' => 'required|max:255',
            'no_hp_cp' => 'required|max:20'
        ]);

        $validatedData['id_supplier'] = $id_supplier;

        Supplier::create($validatedData);

        return redirect('/data_supplier')->with('message', 'Data Supplier Berhasil Ditambahkan!!');
    }

    public function update(Request $request, Supplier $id_supplier)
    {
        $rules = [
            'id_supplier' => 'required|exists:suppliers,id_supplier',
            'alamat' => 'required',
            'nama_cp' => 'required',
            'no_hp_cp' => 'required'
        ];

        if ($request->nama != $id_supplier->nama){
            $rules['nama'] = ['required', 'unique:suppliers,nama', 'max:255'];
        }

        $validatedData = $request->validate($rules);

        Supplier::where('id_supplier', $id_supplier->id_supplier)->update($validatedData);

        return redirect('/data_supplier')->with('message', 'Data Supplier Berhasil Di Perbarui!!');
    }
}
