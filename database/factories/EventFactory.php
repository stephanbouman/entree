<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $title = $this->faker->sentence( 4 );

        return [
            'title'      => $title,
            'date'       => $this->faker->dateTimeBetween( 'now', '+2 years' ),
            'location'   => $this->faker->city,
            'public'     => $this->faker->boolean,
            'open_entry' => $this->faker->boolean,
            'slug'       => Str::slug( $title )
        ];
    }
}
