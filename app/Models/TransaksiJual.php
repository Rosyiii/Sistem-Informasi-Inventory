<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiJual extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id_stok', 'id_stok');
    }
}
