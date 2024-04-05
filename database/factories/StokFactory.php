<?php

namespace Database\Factories;

// use App\Models\Stok;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stok>
 */
class StokFactory extends Factory
{
    
    // protected $model = Stok::class;

    public function definition(): array
    {
        return [
            'id_stok' => $this->faker->unique()->randomElement(["S-000", "S-001", "S-002", "S-003", "S-004", "S-005", "S-006", "S-007", "S-008", "S-009"]),
            'id_supplier' => $this->faker->randomElement(["SS-001", "SS-002"]),
            'nama' => $this->faker->name(),
            'jml_stok' => $this->faker->numberBetween(1,300),
            'satuan' => $this->faker->randomElement(["Pack", "Meter", "Unit"]),
            'harga_beli' => $this->faker->numberBetween(15000, 300000),
            'harga_jual' => $this->faker->numberBetween(20000, 350000),
            'biaya_pesan' => $this->faker->numberBetween(750, 6000),
            'biaya_simpan' => $this->faker->numberBetween(750, 6000),
            'waktu_antar' => $this->faker->numberBetween(1, 3)
        ];
    }
}
