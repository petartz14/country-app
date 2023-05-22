<?php

namespace Database\Factories;

use App\Enums\Countries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = fake()->city(),
            'image_url' => fake()->imageUrl(700, 300, $name, true),
            'country' => fake()->randomElement(array_column(Countries::cases(), 'value')),
        ];
    }
}
