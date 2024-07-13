<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TashkilotRahbari>
 */
class TashkilotRahbariFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(3, 4),
            'tashkilot_id' => $this->faker->numberBetween(1, 5),
            'fish' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'u_fish' => $this->faker->name(),
            'u_email' => $this->faker->safeEmail(),
            'u_phone' => $this->faker->phoneNumber(),
        ];
    }
}
