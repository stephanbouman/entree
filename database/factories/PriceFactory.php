<?php

namespace Database\Factories;

use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $startSalesDate = $this->faker->dateTimeBetween( '-1 month' );
        return [
            'price'         => $this->faker->randomFloat( 2, 10, 199 ),
            'title'   => $this->faker->sentence( 2 ),
            'description' => $this->faker->sentence(20),
            'start_selling' => $startSalesDate,
            'stop_selling'  => $this->faker->dateTimeBetween('now','+1 year'),
            'maximum'       => 100,
        ];
    }
}
