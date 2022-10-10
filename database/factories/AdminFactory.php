<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
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
            'firstname' => 'Jnah',
            'lastname' => 'Redouane',
            'email' => 'jnahredouane@gmail.com',
            'password' => Hash::make('reda1234'),
            'profile_image' => fake()->randomElement($images),
            'phone_number' => '0606725541',
            'city' => 'Tangier',
        ];
    }
}
