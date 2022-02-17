<?php

namespace Database\Factories;

use App\Models\Tabla;
use Illuminate\Database\Eloquent\Factories\Factory;

class TablaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tabla::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

                'marca' => $this->faker->word(),
                'modelo' => $this->faker->word(),
                'tamaño' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 5.0, $max = 10.0),
                'volumen' => $this->faker->  numberBetween($min = 23, $max = 50),
                'num_quillas' => $this->faker->  numberBetween($min = 0, $max = 5),

        ];
    }
}
