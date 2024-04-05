<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Seeder;
use Illuminate\Database\Eloquent\Model;

class TotalTransaksiJual extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'id_user',
        'total_harga',
        'date'
    ];
    
    public function transaksi()
    {
        return $this->hasMany(TransaksiJual::class, 'id_transaksi', 'id_transaksi');
    }

    public function employers()
    {
        return $this->belongsTo(Employers::class, 'id_user', 'id_user');
    }
}
