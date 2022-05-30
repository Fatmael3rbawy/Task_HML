<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' =>$this->faker->randomFloat(5, 5, 10000),
            'description' =>$this->faker->text(50),
            // 'image' => $this->faker->image('public/storage/images',640,480, null, false),
            'image' => $this->faker->imageUrl(400, 300),
            'category_id' => \App\Models\Category::all()->random()->id,
            'admin_id'=>\App\Models\Admin::all()->random()->id ,
        ];
    }
}
