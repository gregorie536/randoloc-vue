<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->city,
            'active' => $this->faker->boolean,
            'supervisor' => $this->faker->name,
            'day' => $this->faker->dayOfWeek,
            'date' => $this->faker->date(),
            'number_km' => $this->faker->randomNumber(2),
            'category_id' => \App\Models\Category::factory(),
            'user_id' => \App\Models\User::factory(),
            'image' => 'path/to/default/image.jpg',
        ];
    }
}
