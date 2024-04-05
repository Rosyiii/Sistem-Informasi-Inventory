<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_stok',
        'id_supplier',
        'nama',
        'jml_stok',
        'satuan',
        'harga_beli',
        'harga_jual',
        'biaya_pesan',
        'biaya_simpan',
        'waktu_antar'
    ];

    // protected $guarded = ['id'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }

    public function scopeFilter($query, array $fillters)
    {
        $query->when($fillters['id_stok'] ?? false, function ($query, $id_stok){
            return $query->where('id_stok', 'like', '%' .$id_stok. '%');
        });

        $query->when($fillters['id_supplier'] ?? false, function ($query, $id_supplier){
            return $query->where('id_supplier', 'like', '%' .$id_supplier. '%');
        });

        $query->when($fillters['nama_stok'] ?? false, function ($query, $nama_stok){
            return $query->where('nama', 'like', '%' .$nama_stok. '%');
        });
    }
}
