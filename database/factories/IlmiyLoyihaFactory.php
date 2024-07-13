<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IlmiyLoyiha>
 */
class IlmiyLoyihaFactory extends Factory
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
            'umumiyyil_id' => $this->faker->numberBetween(1, 2),
            'mavzusi' => $this->faker->sentence(),
            'turi' => $this->faker->word(),
            'dastyri' => $this->faker->word(),
            'q_hamkor_tashkilot' => $this->faker->company(),
            'hamkor_davlat' => $this->faker->country(),
            'muddat' => $this->faker->randomElement(['1 yil', '2 yil', '3 yil']),
            'bosh_sana' => $this->faker->date(),
            'tug_sana' => $this->faker->date(),
            'pan_yunalish' => $this->faker->word(),
            'rahbar_name' => $this->faker->name(),
            'raqami' => $this->faker->regexify('[A-Z0-9]{10}'),
            'sanasi' => $this->faker->date(),
            'sum' => $this->faker->numberBetween(1000, 100000),
            'umumiy_mablag' => $this->faker->numberBetween(1000, 500000),
            'olingan_natija' => $this->faker->sentence(),
            'joriy_holati' => $this->faker->randomElement(['boshlang\'ich', 'davom etmoqda', 'yakunlangan']),
            'tijoratlashtirish' => $this->faker->boolean(),
        ];
    }
}
