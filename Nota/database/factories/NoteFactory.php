<?php

namespace Database\Factories;

use App\Models\Note;
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

    protected $model = Note::class;
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,  // Faker is a PHP library that generates fake data for you.
            'content' => $this->faker->paragraph, 
        ];
    }
}
