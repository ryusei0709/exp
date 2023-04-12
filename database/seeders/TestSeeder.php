<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     protected $model = Test::class;


    public function run(): void
    {
        Test::factory()->count(5)->create();
    }
}
