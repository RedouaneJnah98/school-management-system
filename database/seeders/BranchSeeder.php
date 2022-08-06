<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $branches = collect(['Economic Science', 'Maths Science', 'Physical Science']);

        $branches->each(function ($branchName) {
            $branch = new Branch();
            $branch->name = $branchName;
            $branch->description = 'Good';
            $branch->save();
        });
    }
}
