<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IqtisodiyMoliyaviy>
 */
class IqtisodiyMoliyaviyFactory extends Factory
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
            'kadastr_raqami' => $this->faker->regexify('[A-Z0-9]{10}'),
            'u_maydoni' => $this->faker->numberBetween(100, 10000),
            'taj_maydonlari' => $this->faker->numberBetween(50, 5000),
            'binolar_soni' => $this->faker->numberBetween(1, 20),
            'auditoriya_sigimi' => $this->faker->numberBetween(10, 500),
            'k_xaj_auditor_soni' => $this->faker->numberBetween(1, 10),
            'pondi_miqdori' => $this->faker->numberBetween(1, 100),
            'ilmiyp_bulinalar' => $this->faker->numberBetween(1, 10),
            'gaz' => $this->faker->boolean(),
            'elektr' => $this->faker->boolean(),
            'suv' => $this->faker->boolean(),
            'kanalizasiya' => $this->faker->boolean(),
            'internet' => $this->faker->boolean(),
        ];
    }
}
