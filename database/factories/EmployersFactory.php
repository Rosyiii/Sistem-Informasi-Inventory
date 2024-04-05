<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employers>
 */
class EmployersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            // 'id_user' => $this->faker->unique()->numerify('U-00#'),
            'id_user' => $this->faker->unique()->randomElement(["U-001", "U-002", "U-003"]),
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'tempat_lahir' => $this->faker->word(),
            'ijazah_terakhir' => $this->faker->word(),
            'username' => $this->faker->unique()->userName(),
            'password' => $this->faker->password(6,8),
            'jabatan' => $this->faker->randomElement(["Owner", "Store Manager", "Karyawan"])
        ];
    }
}
