<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => 1,
            'author_id' => 1,
            'assignee_id' => 1,
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['open', 'in_progress', 'done']),
            'priority' => fake()->numberBetween(1, 3),
            'due_date' => fake()->optional()->dateTimeBetween('now', '+1 month'),
        ];
    }
}
