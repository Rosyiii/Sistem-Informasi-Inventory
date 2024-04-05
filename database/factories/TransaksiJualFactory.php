<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransaksiJual>
 */
class TransaksiJualFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_transaksi' => $this->faker->randomElement(["T-001", "T-002", "T-003", "T-004", "T-005", "T-006", "T-007", "T-008", "T-009", "T-010", "T-011", "T-012"]),
            'id_stok' => $this->faker->randomElement(["S-000", "S-001", "S-002", "S-003", "S-004", "S-005", "S-006", "S-007", "S-008", "S-009"]),
            'jumlah' => $this->faker->numberBetween(1,300),
            'harga_satuan' => $this->faker->numberBetween(20000, 350000),
            'total_harga' => $this->faker->numberBetween(1000000, 10000000),
            'tanggal' =>$this->faker->dateTimeBetween('-3 years')
        ];
    }
}
