<?php

namespace Database\Factories;

use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Storage;

/**
 * @extends Factory<Teacher>
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
        $images = Storage::files('public/avatars');

        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('12345678'),
            'dob' => $this->faker->dateTimeBetween('1985-01-01', '1998-12-31')->format('y/m/d'),
            'phone' => $this->faker->phoneNumber(),
            'profile_bio' => $this->faker->sentence(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address(),
            'number' => $this->faker->randomDigit(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->randomNumber(5, true),
            'profile_image' => $this->faker->randomElement($images),
            'last_login_date' => $this->faker->dateTimeBetween('-1 week', Carbon::now()),
            'last_login_ip' => $this->faker->ipv4(),
        ];
    }

//    public function admin()
//    {
//        return $this->state(function () {
//            return [
//                'firstname' => 'Jnah',
//                'lastname' => 'Redouane',
//                'email' => 'jnahredouane@gmail.com',
//                'phone' => '0606725541',
//                'gender' => 'male',
//                'city' => 'Tangier',
//                'zip' => '90000',
//            ];
//        });
//    }
}
