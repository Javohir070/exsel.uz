<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IlmiybnTaminlanga>
 */
class IlmiybnTaminlangaFactory extends Factory
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
            'yillar_id' => $this->faker->numberBetween(1, 2),
            'xodimlar_jami' => $this->faker->numberBetween(10, 100),
            'ilmiy_xodimlar' => $this->faker->numberBetween(5, 50),
            'name' => $this->faker->company(),
            'turi' => $this->faker->word(),
            'moliyal_jami' => $this->faker->numberBetween(100000, 10000000),
            'xodimganisbat_jami' => $this->faker->numberBetween(1, 100),
        ];
    }
}
