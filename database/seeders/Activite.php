<?php

namespace Database\Seeders;

use App\Models\ActiviteModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Activite extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActiviteModel::factory(10)->create();
    }
}
