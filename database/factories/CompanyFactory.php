<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'legal_name' => $this->faker->company(),
            'alias' => $this->faker->companySuffix(),
            'trn_number' => $this->faker->randomNumber(),
            'trn_url' => $this->faker->url(),
            'trade_licence_number' => $this->faker->randomNumber(),
            'trade_licence_url' => $this->faker->url(),
            'trade_licence_expiry_date' => $this->faker->date(),
        ];
    }
}
