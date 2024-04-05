<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

class Employers extends Model
{
    // use HasFactory, Notifiable;
    use HasFactory;

    // protected $guarded = ['id'];

    protected $fillable = ['nama',
        'id_user',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'ijazah_terakhir',
        'jabatan',
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
    
}
