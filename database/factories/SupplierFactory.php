<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'id_supplier' => $this->faker->unique()->randomElement(["SS-001", "SS-002"]),
            'nama' => $this->faker->company(),
            'alamat' => $this->faker->address(),
            'nama_cp' => $this->faker->name(),
            'no_hp_cp' => $this->faker->phoneNumber(),
        ];
    }
}
