<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'last_name'   => $this->faker->lastName,
            'first_name'  => $this->faker->firstName,
            'email'       => $this->faker->safeEmail,
            'tel'         => $this->faker->phoneNumber,
            'gender'      => $this->faker->randomElement(['male', 'female', 'other']),
            'address'     => $this->faker->address,
            'building'    => $this->faker->word,
            'category_id' => $this->faker->numberBetween(1, 5), // CategorySeederの5件に対応
            'detail'      => $this->faker->realText(50),
        ];
    }
}
