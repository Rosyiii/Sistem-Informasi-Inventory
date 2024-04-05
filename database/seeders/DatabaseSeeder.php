<?php

namespace Database\Seeders;

use App\Models\EOQ;
use App\Models\Stok;
use App\Models\Supplier;
use App\Models\Employers;
use App\Models\TransaksiJual;
use App\Models\TransaksiMasuk;
use Illuminate\Database\Seeder;
use App\Models\TotalTransaksiJual;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Employers::factory(3)->create();
        Supplier::factory(2)->create();
        Stok::factory(10)->create();
        TotalTransaksiJual::factory(12)->create();
        TransaksiJual::factory(50)->create();
        TransaksiMasuk::factory(6)->create();
        EOQ::factory(10)->create();
    }
}
