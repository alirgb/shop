<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BrandCategoryFactory extends Factory
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
            'brand_id' => $brandIds->random(),
            'category_id' => $categoryIds->random(),
        ];
    }
}
