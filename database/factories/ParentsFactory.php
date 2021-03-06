<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parents>
 */
class ParentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'phone_number' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->dateTimeBetween('1970/01/01', '1999/31/12'),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'profile_image' => 'default-avatar-parent.jpg',
            'address' => $this->faker->address(),
            'number' => $this->faker->randomDigit(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->randomNumber(5),
            'last_login_date' => $this->faker->dateTimeBetween('-1 week'),
            'last_login_ip' => $this->faker->ipv4(),
        ];
    }
}
