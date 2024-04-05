<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Supplier;
use App\Models\TotalTransaksiJual;
use App\Models\TransaksiJual;
use App\Models\TransaksiMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TambahTransaksiController extends Controller
{
    public function indexTambahStokLama()
    {
        return view('tambah_stok', [
            "tittle" => "Tambah Stok",
            "stoks" => Stok::all()
        ]);
    }

    public function indexTambahStokBaru()
    {
        return view('tambah_stok_baru', [
            "tittle" => "Tambah Stok Baru",
            "satuans" => ["Unit", "Meter", "Pack"],
            "suppliers" => Supplier::all()
        ]);
    }

    public function storeTambahStokBaru(Request $request)
    {
        $last_id = Stok::orderBy('id_stok', 'desc')->first()->id_stok;
        $last_id = substr($last_id,2);
        $tambah = $last_id + 1;
        $id_stok = "S-".sprintf("%03d",$tambah);

        $last_id = TransaksiMasuk::orderBy('id_transaksi_masuk', 'desc')->first()->id_transaksi_masuk;
        $last_id = substr($last_id,3);
        $tambah = $last_id + 1;
        $id_transaksi_masuk = "TI-".sprintf("%03d",$tambah);

        $validatedData = $request->validate([
            'nama_supplier' => 'required|exists:suppliers,nama',
            'nama_stok' => ['required','max:255', 'unique:stoks,nama'],
            'satuan' => 'required',
            'jml_stok' => 'required',
            'harga_beli' => 'required',
            'waktu_antar' => 'required'
        ]);

        $current = Carbon::now();
        
        $id_supplier = Supplier::where('nama', $validatedData['nama_supplier'])->first()->id_supplier;

        $dataInput['jml_stok'] = $validatedData['jml_stok'];
        $dataInput['harga_beli'] = $validatedData['harga_beli'];
        $dataInput['waktu_antar'] = $validatedData['waktu_antar'];
        $dataInput['id_supplier'] = $id_supplier;
        $dataInput['id_stok'] = $id_stok;

        $dataInputStok = $dataInput;
        $dataInputTransaksiMasuk = $dataInput;

        $dataInputStok['satuan'] = $validatedData['satuan'];
        $dataInputStok['nama'] = $validatedData['nama_stok'];
        $dataInputStok['harga_jual'] = ($validatedData['harga_beli'] * (10/100)) + $validatedData['harga_beli'];
        $dataInputStok['biaya_pesan'] = $validatedData['harga_beli'] * (5/100);
        $dataInputStok['biaya_simpan'] = $dataInputStok['biaya_pesan'];

        $dataInputTransaksiMasuk['id_transaksi_masuk'] = $id_transaksi_masuk;
        $dataInputTransaksiMasuk['id_user'] = auth()->user()->id_user;
        $dataInputTransaksiMasuk['harga_total'] = $validatedData['jml_stok'] * $validatedData['harga_beli'];
        $dataInputTransaksiMasuk['biaya_pesan'] = $dataInputStok['biaya_pesan'];
        $dataInputTransaksiMasuk['date'] = $current;

        Stok::create($dataInputStok);
        TransaksiMasuk::create($dataInputTransaksiMasuk);

        return redirect('/data_stok')->with('message', 'Data Stok Berhasil Ditambahkan!!');
    }

    public function storeTambahStokLama(Request $request)
    {
        $last_id = TransaksiMasuk::orderBy('id_transaksi_masuk', 'desc')->first()->id_transaksi_masuk;
        $last_id = substr($last_id,3);
        $tambah = $last_id + 1;
        $id_transaksi_masuk = "TI-".sprintf("%03d",$tambah);

        $current = Carbon::now();

        $nama = $request->validate(['nama_stok' => ['required','max:255', 'exists:stoks,nama']]);

        $validatedData = $request->validate([
            'jml_stok' => 'required',
            'harga_beli' => 'required',
            'waktu_antar' => 'required'
        ]);
        
        $stok = Stok::where('nama', $nama)->first();
        $id_stok = $stok['id_stok'];

        // dd($stok, $id_stok, $nama);

        $dataInputTransaksiMasuk = $validatedData;

        $dataUpdateStok = $validatedData;
        $dataUpdateStok['jml_stok'] = $stok['jml_stok'] + $validatedData['jml_stok'];
        $dataUpdateStok['harga_jual'] = ($validatedData['harga_beli'] * (10/100)) + $validatedData['harga_beli'];
        $dataUpdateStok['biaya_pesan'] = $validatedData['harga_beli'] * (5/100);
        $dataUpdateStok['biaya_simpan'] = $dataUpdateStok['biaya_pesan'];

        $dataInputTransaksiMasuk['id_stok'] = $id_stok;
        $dataInputTransaksiMasuk['id_supplier'] = $stok['id_supplier'];
        $dataInputTransaksiMasuk['id_transaksi_masuk'] = $id_transaksi_masuk;
        $dataInputTransaksiMasuk['id_user'] = auth()->user()->id_user;
        $dataInputTransaksiMasuk['harga_total'] = $validatedData['jml_stok'] * $validatedData['harga_beli'];
        $dataInputTransaksiMasuk['biaya_pesan'] = $dataUpdateStok['biaya_pesan'];
        $dataInputTransaksiMasuk['date'] = $current;

        Stok::where('id_stok', $stok['id_stok'])->update($dataUpdateStok);
        TransaksiMasuk::create($dataInputTransaksiMasuk);

        return redirect('/data_stok')->with('message', 'Data Stok Berhasil Diperbarui!!');
    }

    public function transaksiKeluar()
    {
        return view('tambah_transaksi', [
            "tittle" => "Tambah Transaksi",
            "stoks" => Stok::all()
        ]);
    }

    public function storeTransaksi(Request $request)
    {
        $last_id = TransaksiJual::orderBy('id_transaksi', 'desc')->first()->id_transaksi;
        $last_id = substr($last_id,2);
        $tambah = $last_id + 1;
        $id_transaksi = "T-".sprintf("%03d",$tambah);

        $current = Carbon::now();
        
        $validatedData = $request->validate([
            'nama' => 'required|exists:stoks,nama',
            'jumlah' => 'required',
            'harga_jual' => 'required',
            'total_harga' => 'required',
            'grandTotal' => 'required'
        ]);

        $count = count($validatedData["nama"]);

        for($i=0;$i<$count;$i++)
        {
            $stok[$i] = Stok::where("nama", $validatedData['nama'][$i])->first();
            
            if($stok[$i])
            {
                $jml_stok[$i] = $stok[$i]['jml_stok'] - $validatedData['jumlah'][$i];

                if($jml_stok[$i]<0)
                {
                    return back()->with('message', 'Data yang anda masukan terlalu banyak, jumlah Stok tidak mencukupi');
                }
            }else{
                return back()->with('message', 'Data yang anda masukan salah, cobalah untuk memasukan data stok lain');
            }
        }

        $inputTotalTransaksi = [
            "id_transaksi" => $id_transaksi,
            "id_user" => auth()->user()->id_user,
            "total_harga" => $validatedData['grandTotal'],
            "date" => $current
        ];

        TotalTransaksiJual::create($inputTotalTransaksi);

        for($i=0;$i<$count;$i++)
        {
            $inputTransaksi[$i] =[
                "id_transaksi" => $id_transaksi,
                "id_stok" => $stok[$i]['id_stok'],
                "jumlah" => $validatedData['jumlah'][$i],
                "harga_satuan" => $validatedData['harga_jual'][$i],
                "total_harga" => $validatedData['total_harga'][$i],
                "tanggal" => $current
            ];
        }
        
        for($i=0;$i<$count;$i++)
        {
            TransaksiJual::create($inputTransaksi[$i]);
            Stok::where('id_stok', $stok[$i]['id_stok'])->update(['jml_stok' => $jml_stok[$i]]);
        }

        return redirect('/data_transaksi')->with('message', 'Data Transaksi Berhasil Ditambahkan!!');

        // dd($validatedData, $count, $stok, $inputTotalTransaksi, $inputTransaksi, $jml_stok);
    }
}
