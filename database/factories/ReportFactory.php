<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('-1 month', 'now');
        $end = (clone $start)->modify('+7 days');

        return [
            'period_start' => $start,
            'period_end'   => $end,
            'payload'      => [
                'tasks_total'     => fake()->numberBetween(10, 50),
                'tasks_completed' => fake()->numberBetween(5, 30),
            ],
            'path' => 'reports/' . fake()->uuid() . '.json',
        ];
    }
}
