<?php

namespace Database\Seeders;

use App\Models\Test2;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Test2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Test2::factory()->count(100)->create();
    }
}
