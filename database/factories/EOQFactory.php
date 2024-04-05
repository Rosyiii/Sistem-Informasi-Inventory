<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EOQ>
 */
class EOQFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_eoq' => $this->faker->unique()->randomElement(["EOQ-000", "EOQ-001", "EOQ-002", "EOQ-003", "EOQ-004", "EOQ-005", "EOQ-006", "EOQ-007", "EOQ-008", "EOQ-009"]),
            'id_stok' => $this->faker->randomElement(["S-000", "S-001", "S-002", "S-003", "S-004", "S-005", "S-006", "S-007", "S-008", "S-009"]),
            'kebutuhan_tahunan' => $this->faker->numberBetween(1,300),
            'eoq' => $this->faker->numberBetween(1,300),
            'frekuensi' => $this->faker->numberBetween(1,300),
            'jarak' => $this->faker->numberBetween(1,300),
            'safety_stok' => $this->faker->numberBetween(1,300),
            'reorder' => $this->faker->numberBetween(1,300)
        ];
    }
}
