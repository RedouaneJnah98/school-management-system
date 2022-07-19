<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'password' => '0123456789', // password
            'dob' => $this->faker->dateTimeBetween('1985-01-01', '1998-12-31')->format('y/m/d'),
            'phone' => $this->faker->phoneNumber(),
            'status' => 'teacher',
            'profile_bio' => $this->faker->sentence(),
            'password_confirmation' => '12345678', // Pssword Confirmation
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address(),
            'number' => $this->faker->randomDigit(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->randomNumber(5, true),
            'profile_image' => 'default-avatar-teacher.jpg',
            'last_login_date' => $this->faker->dateTimeBetween('-1 week', Carbon::now()),
            'last_login_ip' => $this->faker->ipv4(),
        ];
    }

    public function admin()
    {
        return $this->state(function () {
            return [
                'firstname' => 'Jnah',
                'lastname' => 'Redouane',
                'email' => 'jnahredouane@gmail.com',
                'password' => '12345678',
                'dob' => $this->faker->dateTimeBetween('1985-01-01', '1998-12-31')->format('y/m/d'),
                'phone' => '0606725541',
                'status' => 'admin',
                'profile_bio' => $this->faker->sentence(),
                'password_confirmation' => '12345678',
                'gender' => 'male',
                'address' => $this->faker->address(),
                'number' => $this->faker->randomDigit(),
                'city' => 'Tangier',
                'zip' => '90000',
//                'profile_image' => $this->faker->imageUrl(50, 50, 'avatar'),
                'last_login_date' => $this->faker->dateTimeBetween('-1 week', Carbon::now()),
                'last_login_ip' => $this->faker->ipv4(),
            ];
        });
    }
}
