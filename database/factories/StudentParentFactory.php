<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentParent>
 */
class StudentParentFactory extends Factory
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
            'password_confirmation' => Hash::make('12345678'),
            'phone_number' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->dateTimeBetween('1970/01/01', '1999/31/12'),
            'profile_image' => $this->faker->imageUrl(50, 50, 'avatar'),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'address' => $this->faker->address(),
            'number' => $this->faker->randomDigit(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->randomNumber(5),
        ];
    }
}
