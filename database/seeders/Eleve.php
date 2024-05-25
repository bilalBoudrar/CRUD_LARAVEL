<?php

namespace Database\Seeders;

use App\Models\EleveModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Eleve extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EleveModel::factory(10)->create();
    }
}
