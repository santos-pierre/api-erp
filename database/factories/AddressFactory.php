<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street_name' => $this->faker->streetName(),
            'street_number' => $this->faker->buildingNumber(),
            'zip_code' => $this->faker->postcode(),
            'city_name' => $this->faker->city(),
            'country' => $this->faker->country()
        ];
    }
}
