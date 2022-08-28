<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
            'password' => Hash::make('12345678'),
            'profile_image' => 'default-avatar-male.jpg',
            'phone' => $this->faker->phoneNumber(),
            'date_of_join' => $this->faker->dateTimeInInterval(),
            'date_of_birth' => $this->faker->dateTimeBetween('2008-01-01', '2012-12-31')->format('y/m/d'),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'last_login_date' => $this->faker->dateTimeBetween('-1 week'),
            'last_login_ip' => $this->faker->ipv4(),
        ];
    }
}
