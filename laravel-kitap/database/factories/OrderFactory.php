<?php

namespace Database\Factories;

use App\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'selflink' => $this->faker->slug(),
            'adres' => $this->faker->address(),
            'mesaj' => $this->faker->text(),
            'telefon' => $this->faker->phoneNumber(),
            'json' => json_decode("json"),
        ];
    }
}
