<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $brandIds = Brand::get('id');
        $categoryIds = Category::get('id');
        return [
            'name' => $this->faker->text(10),
            'img' => rand(1, 10) . '.jpg',
            'sku' => rand(1000, 9999),
            'brand_id' => $brandIds->random(),
            'category_id' => $categoryIds->random(),
        ];
    }
}
