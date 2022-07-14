<?php

namespace Database\Factories;

use App\Models\Parents;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
//            'parent_id' => Parents::factory(),
//            'student_id' => Student::factory(),
            'message' => $this->faker->text
        ];
    }
}
