<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $parents = Parents::all();
        $students = Student::all();

        Message::factory(15)->make()->each(function ($message) use ($parents, $students) {
            $message->parent_id = $parents->random()->id;
            $message->student_id = $students->random()->id;
            $message->save();
        });
//        Message::factory(10)->create();
    }
}
