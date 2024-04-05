<?php

namespace App\Models;



class employers
{
    private static $employers = [
        [
            "nama" => "karyawan 1",
            "id_user" => "U-001",
            "alamat" => "umbulharjo",
            "tempat_lahir" => "Sleman",
            "tanggal_lahir" => "17 Agustus 1945",
            "ijazah_terakhir" => "S3 ekonomi",
            "username" => "karyawan1",
            "password" => "123456abcdef",
            "jabatan" => "Owner"
        ],
        [
            "nama" => "karyawan 2",
            "id_user" => "U-002",
            "alamat" => "Ngaglik",
            "tempat_lahir" => "Sleman",
            "tanggal_lahir" => "18 July 1998",
            "ijazah_terakhir" => "Pendidikan Profesi Guru",
            "username" => "karyawan2",
            "password" => "123456abcdef",
            "jabatan" => "Store Manajer"
        ],
        [
            "nama" => "karyawan 3",
            "id_user" => "U-003",
            "alamat" => "Wirobrajan",
            "tempat_lahir" => "Sleman",
            "tanggal_lahir" => "26 Agustus 1999",
            "ijazah_terakhir" => "S1 Informatika",
            "username" => "karyawan3",
            "password" => "123456abcdef",
            "jabatan" => "Karyawan"
        ]
    ];

    public static function all(){
        return collect(self::$employers);
    }

    public static function find($id_karyawan){
        $result = static::all();

        return $result->firstWhere('id_user', $id_karyawan);
    }
}
