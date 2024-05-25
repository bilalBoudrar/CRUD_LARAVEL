<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ClubModel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Club extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClubModel::factory(10)->create();
    }
}
