<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $titleName = $this->faker->name;
        $nameSlug = Str::of($titleName)->slug('-');
        return [
            'name' => $titleName,
            'prive' => $this->faker->randomFloat(2, 0, 8),
            'descripption'=> $this->faker->text,
            'slug' => $nameSlug

        ];
    }
}
