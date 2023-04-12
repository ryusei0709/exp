<?php

namespace Database\Factories;

use App\Models\Test2;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test2>
 */
class Test2Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Test2::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'test_id' => fake()->numberBetween(1, 5),
        ];
    }
}
