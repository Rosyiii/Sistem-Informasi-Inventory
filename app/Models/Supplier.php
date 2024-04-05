<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable =['id_supplier',
        'nama',
        'alamat',
        'nama_cp',
        'no_hp_cp'
    ];

    public function stok()
    {
        return $this->hasMany(Stok::class, 'id_supplier', 'id_supplier');
    }

    public function scopeFilter($query, array $fillters)
    {
        $query->when($fillters['id_supplier'] ?? false, function ($query, $id_supplier){
            return $query->where('id_supplier', 'like', '%' .$id_supplier. '%');
        });

        $query->when($fillters['nama_supplier'] ?? false, function ($query, $nama_supplier){
            return $query->where('nama', 'like', '%' .$nama_supplier. '%');
        });
    }
}
