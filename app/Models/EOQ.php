<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOQ extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_eoq',
        'id_stok',
        'kebutuhan_tahunan',
        'eoq',
        'frekuensi',
        'jarak',
        'safety_stok',
        'reorder',
        'date'
    ];
    
    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id_stok', 'id_stok');
    }
}
