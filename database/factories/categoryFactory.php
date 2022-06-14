<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Category::class;
    public function definition()
    {
        return
        [
            'name'          => $this->faker->name,
            'created_by'    => 1,
            'remove'        => $this->faker->boolean(),
        ];
    }
}
