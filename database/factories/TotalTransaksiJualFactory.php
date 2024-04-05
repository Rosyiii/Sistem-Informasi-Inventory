<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TotalTransaksiJual>
 */
class TotalTransaksiJualFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_transaksi' => $this->faker->unique()->randomElement(["T-001", "T-002", "T-003", "T-004", "T-005", "T-006", "T-007", "T-008", "T-009", "T-010", "T-011", "T-012"]),
            'id_user' => $this->faker->randomElement(["U-001", "U-002", "U-003"]),
            'total_harga' => $this->faker->numberBetween(1000000, 10000000),
            'date' => $this->faker->dateTimeBetween('-3 years')
        ];
    }
}
