<?php

namespace Database\Factories;

use App\Models\Audience;
use Illuminate\Database\Eloquent\Factories\Factory;

class AudienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Audience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence()
        ];
    }
}
