<?php

namespace Database\Factories;

use App\Models\Capaian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capaian>
 */
class CapaianFactory extends Factory
{
    protected $model = Capaian::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pernyataan' => $this->faker->sentence(),
            'format_jawaban' => $this->faker->randomElement(['format 1', 'format 2', 'deskripsi']),
        ];
    }
}
