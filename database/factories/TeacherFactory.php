<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'dob' => $this->faker->dateTimeBetween('1985-01-01', '1998-12-31')->format('y/m/d'),
            'phone' => $this->faker->phoneNumber(),
            'status' => $this->faker->randomElement(['admin', 'teacher']),
            'profile_bio' => $this->faker->sentence(),
            'password_confirmation' => Hash::make('12345678'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address(),
            'number' => $this->faker->randomDigit(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->randomNumber(5, true),
            'profile_image' => $this->faker->imageUrl(50, 50, 'avatar'),
        ];
    }
}
