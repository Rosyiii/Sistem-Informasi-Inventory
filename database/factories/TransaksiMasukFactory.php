<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransaksiMasuk>
 */
class TransaksiMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_transaksi_masuk' => $this->faker->unique()->randomElement(["TI-001", "TI-002", "TI-003", "TI-004", "TI-005", "TI-006"]),
            'id_stok' => $this->faker->randomElement(["S-000", "S-001", "S-002", "S-003", "S-004", "S-005", "S-006", "S-007", "S-008", "S-009"]),
            'id_supplier' => $this->faker->randomElement(["SS-001", "SS-002"]),
            'id_user' => $this->faker->randomElement(["U-001", "U-002", "U-003"]),
            'jml_stok' => $this->faker->numberBetween(1,300),
            'harga_beli' => $this->faker->numberBetween(15000, 300000),
            'harga_total' => $this->faker->numberBetween(1000000, 10000000),
            'biaya_pesan' => $this->faker->numberBetween(750, 6000),
            'waktu_antar' => $this->faker->numberBetween(1, 3),
            'date' =>$this->faker->dateTimeBetween('-3 years')
        ];
    }
}
