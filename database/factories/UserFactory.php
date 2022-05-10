<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
        ];
//        return [
//            'firstname' => $this->faker->firstName(),
//            'lastname' => $this->faker->lastName(),
//            'email' => $this->faker->unique()->safeEmail(),
//            'email_verified_at' => now(),
//            'password' => Hash::make('12345678'), // password
//            'dob' => $this->faker->dateTimeBetween('1985-01-01', '1998-12-31')->format('d/m/y'),
//            'phone' => $this->faker->phoneNumber(),
//            'status' => $this->faker->randomElement(['admin', 'teacher']),
//            'profile_bio' => $this->faker->sentence(),
//            'confirm_password' => Hash::make('12345678')
//        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
