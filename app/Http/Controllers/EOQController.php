<?php

namespace App\Http\Controllers;

use App\Models\EOQ;
use App\Models\Stok;
use App\Models\TransaksiJual;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EOQController extends Controller
{
    public function index()
    {
        return view('eoq', [
            "tittle" => "EOQ",
            "data_eoq" => EOQ::with('stok')->latest()->paginate(11)
        ]);
    }

    public function show(EOQ $id_eoq){
        return view('detail_eoq', [
            "tittle" => "Detail EOQ",
            "result" => $id_eoq
        ]);
    }

    public function ajax($nama)
    {
        $stok = Stok::where('nama', $nama)->first();
        return json_encode($stok);
    }

    public function tambahEOQ()
    {
        return view('tambah_eoq', [
            "tittle" => "Tambah EOQ",
            "stoks" => Stok::all()
        ]);
    }

    public function storeEOQ(Request $request)
    {
        $last_id = EOQ::orderBy('id_eoq', 'desc')->first()->id_eoq;
        $last_id = substr($last_id,4);
        $tambah = $last_id + 1;
        $id_eoq = "EOQ-".sprintf("%03d",$tambah);

        $current = Carbon::now();

        $id_stok = $request->validate(['id_stok' => ['required', 'exists:stoks,id_stok']]);

        $stok = Stok::where('id_stok', $id_stok)->first();

        $kebutuhan_tahunan = TransaksiJual::where('id_stok', $id_stok)
                            ->whereRaw('YEAR(tanggal) >= YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))')
                            ->get()
                            ->sum('jumlah');
        $kebutuhan_tahunan = (int)ceil($kebutuhan_tahunan);

        $eoq = (int)ceil(sqrt((2*$kebutuhan_tahunan*($stok['biaya_pesan'] + $stok['harga_beli']))/$stok['biaya_simpan']));

        $frekuensi = (int)ceil($kebutuhan_tahunan / $eoq);

        $W = 313;
        $jarak = (int)ceil($W / $frekuensi);

        $bmax = TransaksiJual::where('id_stok', $id_stok)
                ->whereRaw('YEAR(tanggal) >= YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))')
                ->get()
                ->max('jumlah');
        
        $br = $kebutuhan_tahunan / $W;
        $safety_stok = (int)ceil($bmax - $br);

        $reorder = (int)ceil(($kebutuhan_tahunan / $W) + $safety_stok);

        $inputEOQ = [
            "id_eoq" => $id_eoq, 
            "id_stok" => $id_stok['id_stok'], 
            "kebutuhan_tahunan" => $kebutuhan_tahunan, 
            "eoq" => $eoq, 
            "frekuensi" => $frekuensi, 
            "jarak" => $jarak, 
            "safety_stok" => $safety_stok, 
            "reorder" => $reorder,
            "date" => $current
        ];
        
        EOQ::create($inputEOQ);

        return redirect('/eoq')->with('message', 'Data EOQ Berhasil Ditambahkan!!');
    }

    public function destroy(Request $request)
    {
        EOQ::where('id_eoq', $request->id_eoq)->delete();

        return redirect('/eoq')->with('message', 'Data EOQ berhasil dihapus!!');
    }
}
