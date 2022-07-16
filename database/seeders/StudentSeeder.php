<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $parents = Parents::all();

        Student::factory(50)->make()->each(function ($student) use ($parents) {
            $student->parent_id = $parents->random()->id;
            $student->save();
        });
    }
}
