<?php

namespace Database\Factories;

use App\Models\Bicycle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bicycle>
 */
class BicycleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bicycle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'color' => $this->faker->randomElement(['Blue','Red','Black','Orange','Green']),
            'type' => $this->faker->randomElement(['Road','Mountain','Folding','Hybrid','Cruiser']),
            'speed' => $this->faker->randomElement(['Single-speed','3-speed','5-speed','7-speed','8-speed'])
        ];
    }
}
