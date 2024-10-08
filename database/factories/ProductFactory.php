<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;


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
        $faker = \Faker\Factory::create('fr_FR'); // Utilise le français

        $category = Category::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        // $imageFileName = $this->faker->image(storage_path('app/public/images'), 400, 300, null, false);

        // $imageName = pathinfo($imageFileName, PATHINFO_BASENAME);

        // Chemin vers le dossier contenant les images
        $imagesPath = storage_path('app/public/images');
        $images = array_diff(scandir($imagesPath), array('..', '.'));

        // Sélection aléatoire d'une image
        $imageName = $this->faker->randomElement($images);



        return [
            //
            'title'=> $faker->word(),
            'category_title'=> $category->title,
            'user_uuid'=>$user->uuid,
            'price'=>$faker->randomNumber(4),
            'photo'=>$imageName,
            'detail'=>$faker->realText(100),
        ];
    }
}
