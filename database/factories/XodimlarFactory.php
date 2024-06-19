<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Xodimlar>
 */
class XodimlarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tashkilot_id' => rand(1,2),
            'user_id' => rand(3, 4), 
            'fish' => fake()->name(),
            'jshshir' => "123456789",
            'jinsi' => "erkak",
            'lavozimi' => "boshliq",
        ];
    }
}
