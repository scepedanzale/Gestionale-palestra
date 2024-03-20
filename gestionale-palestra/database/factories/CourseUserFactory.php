<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course_User>
 */
class CourseUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $days = ['Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'];

        return [
            'user_id' => User::get()->random()->id,
            'course_id' => Course::get()->random()->id,
            'day' => fake()->randomElement($days),
            'start_time' =>  fake()->dateTimeBetween('08:00', '19:00')->format('H:00'),
            'state' => 'Pending'
        ];
    }
}
