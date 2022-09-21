<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Parents::factory(50)
            ->has(Student::factory()->count(rand(1, 3)), 'children')
            ->create();
    }
}
