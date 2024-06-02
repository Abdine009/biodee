<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;


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
    public function definition(): array
    {

        $category = Category::inRandomOrder()->first();

        $imageFileName = $this->faker->image(storage_path('app/public/images'), 400, 300, null, false);

        $imageName = pathinfo($imageFileName, PATHINFO_BASENAME);


        return [
            //
            'title'=> $this->faker->sentence(6, true),
            'category_title'=> $category->title,
            'price'=>$this->faker->randomNumber(4),
            'photo'=>$imageName,
            'detail'=>$this->faker->sentences(4, true),
        ];
    }
}
