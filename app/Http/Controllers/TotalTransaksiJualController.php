<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TotalTransaksiJual;
use Illuminate\Support\Facades\DB;

class TotalTransaksiJualController extends Controller
{
    public function index()
    {
        return view('data_transaksi', [
            "tittle" => "Data Transaksi Jual",
            "transactions" => TotalTransaksiJual::with('employers')->latest()->paginate(10)
        ]);
    }    

    public function filterShow($request)
    {
        if($request == 'Hari')
        {
            return view('data_transaksi', [
                "tittle" => "Data Transaksi Jual",
                "transactions" => DB::table('total_transaksi_juals')
                ->select(DB::raw("CONCAT(YEAR(date),'/',MONTH(date),'/',DAY(date)) AS date"),
                DB::raw('SUM(total_harga) AS total_harga'))
                ->groupByRaw("CONCAT(YEAR(date),'/',MONTH(date),'/',DAY(date))")
                ->orderBy('date', 'desc')
                ->paginate(15)
            ]);
        }elseif($request == 'Bulan')
        {
            return view('data_transaksi', [
                "tittle" => "Data Transaksi Jual",
                "transactions" => DB::table('total_transaksi_juals')
                ->select(DB::raw("CONCAT(YEAR(date),'/',MONTH(date)) AS date"),
                DB::raw('SUM(total_harga) AS total_harga'))
                ->groupByRaw("CONCAT(YEAR(date),'/',MONTH(date))")
                ->orderBy('date', 'desc')
                ->paginate(15)
            ]);
        }elseif($request == 'Tahun')
        {
            return view('data_transaksi', [
                "tittle" => "Data Transaksi Jual",
                "transactions" => DB::table('total_transaksi_juals')
                ->select(DB::raw("CONCAT(YEAR(date)) AS date"),
                DB::raw('SUM(total_harga) AS total_harga'))
                ->groupByRaw("CONCAT(YEAR(date))")
                ->orderBy('date', 'desc')
                ->paginate(15)
            ]);
        }
    }
}
