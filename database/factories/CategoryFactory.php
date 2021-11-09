<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        $categories = ['News', 'Fiction', 'Politics', 'Opinion', 'Sciences', 'Sport', 'Humor', 'lifestyle', 'Drama', 'Other'];
        return ['name'=> $categories[$this->faker->unique()->numberBetween(0, 9)],];
    }
}
