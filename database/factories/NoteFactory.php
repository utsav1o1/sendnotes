<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> User::factory(),
            'name'=> $this->faker->title,
            'description'=> $this->faker->paragraph,
            'is_published'=> $this->faker->boolean,
            'recipient'=>$this->faker->email,
            'send_date'=>$this->faker->dateTimeBetween('now','+10 days'),
            'heart_count'=> $this->faker->numberBetween(0,30),

        ];
    }
}
