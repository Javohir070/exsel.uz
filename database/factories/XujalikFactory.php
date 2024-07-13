<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Xujalik>
 */
class XujalikFactory extends Factory
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
            'ishlanma_nomi' => $this->faker->words(3, true),
            'intellektual_raqami' => $this->faker->regexify('[A-Z0-9]{10}'),
            'intellektual_sana' => $this->faker->date(),
            'ishlanma_mavzu' => $this->faker->sentence(),
            'ishlanma_turi' => $this->faker->randomElement(['ilmiy', 'amaliy', 'innovatsion']),
            'lisenzion' => $this->faker->boolean(),
            'sh_raqami' => $this->faker->regexify('[A-Z0-9]{8}'),
            'sh_sanasi' => $this->faker->date(),
            'ilmiy_nomi' => $this->faker->jobTitle(),
            'stir' => $this->faker->regexify('[0-9]{9}'),
            'sh_summa' => $this->faker->numberBetween(1000, 100000),
            'shkelib_sana' => $this->faker->date(),
            'shkelib_summa' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
