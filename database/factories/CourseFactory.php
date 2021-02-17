<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Level;
use App\Models\Category;
use App\Models\Price;

use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::DRAFT, Course::REVIEW, Course::PUBLISHED]),
            'slug' => Str::slug($title),

            'user_id' => $this->faker->randomElement([1,2,3,4,5]),
            'level_id' => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id' => Price::all()->random()->id,
        ];
    }
}
