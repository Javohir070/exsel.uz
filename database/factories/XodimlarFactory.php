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
            'tashkilot_id' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(3, 4),
            'fish' => $this->faker->name(),
            'jshshir' => $this->faker->numerify('###########'),
            'jinsi' => $this->faker->randomElement(['erkak', 'ayol']),
            'lavozimi' => $this->faker->jobTitle(),
            'yil' => $this->faker->year(),
            'ish_tartibi' => $this->faker->randomElement(['to\'liq', 'yarim']),
            'shtat_birligi' => $this->faker->randomElement(['bir', 'ikki']),
            'urindoshlik_asasida' => $this->faker->boolean(),
            'pedagoglik' => $this->faker->boolean(),
            'malumoti' => $this->faker->randomElement(['oliy', 'o\'rta']),
            'uzbek_panlar_azosi' => $this->faker->boolean(),
            'ilmiy_daraja' => $this->faker->randomElement(['PhD', 'DSc']),
            'ilmiy_daraja_yil' => $this->faker->year(),
            'ilmiy_unvoni' => $this->faker->randomElement(['professor', 'dotsent']),
            'ilmiy_unvoni_y' => $this->faker->year(),
            'ixtisosligi' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
        ];
    }
}
