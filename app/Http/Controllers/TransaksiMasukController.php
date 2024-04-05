<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksimasuk;

class TransaksiMasukController extends Controller
{
    public function index()
    {
        return view('data_transaksi_masuk', [
            "tittle" => "Data Transaksi Masuk",
            "transactions" => TransaksiMasuk::with(['stok', 'supplier', 'employers'])->latest()->paginate(9)
        ]);
    }

    public function show(TransaksiMasuk $id_transaksi_masuk){
        return view('detail_transaksi_masuk', [
            "tittle" => "Detail Transaksi Masuk",
            "result" => $id_transaksi_masuk
        ]);
    }
}
