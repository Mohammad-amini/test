<?php

namespace Database\Factories;

use App\Models\Advertise;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdvertiseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'note' => $this->faker->text(),
            'user' => $this->faker->numberBetween(1, 10),
            'category' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->randomFloat(100000, 0),
            'specs' => '',
            'expire' => $this->faker->date()
        ];
    }
}