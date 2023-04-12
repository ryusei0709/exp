<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => '大カテゴリ',
            'children' => [
                [
                    'name' => '中カテゴリ',
                    'children' => [
                        [ 'name' => '小カテゴリ' ],
                    ],
                ],
            ],
        ]);
    }
}
