<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $groups = collect(['SEG 1', 'SEG 2', 'SM 1', 'SM 2', 'PC 1', 'PC 2']);

        $groups->each(function ($groupName) {
            $group = new Group();
            $group->name = $groupName;
            $group->description = 'Good';
            $group->save();
        });
    }
}
