<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Parents;
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
        Parents::factory(50)->hasAttached(
            Message::factory(),
        )->create();
    }
}
