<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition()
    {
        return [
            'nis' => $this->faker->unique()->numerify('2201####'),
            'name' => $this->faker->name,
            'kelas' => $this->faker->randomElement(['TK A', 'TK B']),
            'umur' => $this->faker->numberBetween(5, 12),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'photo' => $this->faker->imageUrl(640, 480, 'people'), // URL gambar acak
        ];
    }
}
