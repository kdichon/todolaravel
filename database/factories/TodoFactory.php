<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $todoModel = Todo::class ;

    public function definition(): array
    {
        return [
            //
            'task' => fake()->sentence,
            'status' => fake()->randomElement(['n','o'])
        ];
    }
}
