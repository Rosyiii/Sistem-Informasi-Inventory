<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiMasuk extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_transaksi_masuk',
        'id_stok',
        'id_supplier',
        'id_user',
        'jml_stok',
        'harga_beli',
        'harga_total',
        'biaya_pesan',
        'waktu_antar',
        'date'
    ];

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id_stok', 'id_stok');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }

    public function employers()
    {
        return $this->belongsTo(Employers::class, 'id_user', 'id_user');
    }
}
