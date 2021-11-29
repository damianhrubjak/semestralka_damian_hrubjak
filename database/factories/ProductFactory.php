<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productCategories = ProductCategory::all();
        return [
            'product_category_id' => $productCategories->random()->id,
            'user_id' => 1,
            'name' => $this->faker->company(),
            'parameters' => $this->faker->catchPhrase(),
            'condition' => $this->faker->randomElement(['New', 'Used', 'Refurbished', 'Damaged']),
            'price' => $this->faker->randomFloat(3, 0, 10000),
            'description' => $this->faker->text(500)
        ];
    }
}
