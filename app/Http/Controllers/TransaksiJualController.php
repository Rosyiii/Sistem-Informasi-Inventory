<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiJual;
use App\Models\TotalTransaksiJual;

class TransaksiJualController extends Controller
{
    public function index(TotalTransaksiJual $id_transaksi)
    {
        return view('detail_transaksi', [
            "tittle" => "Detail Transaksi Jual",
            "main" => $id_transaksi,
            "transactions" => TransaksiJual::with('stok')->where('id_transaksi', $id_transaksi->id_transaksi)->get(),
            "i" => 1
        ]);
    }
}
