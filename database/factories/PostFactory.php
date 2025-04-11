<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    private $imagesFolderPath;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->imagesFolderPath = storage_path('app/public/images/');

        $previewImage = $this->checkAndCreateImage('cat-preview.jpg');
        $mainImage = $this->checkAndCreateImage('cat-main.jpg');

        return [
            'title' => fake()->name(),
            'content' => fake()->text(),
            'category_id' => Category::factory()->create()->id,
            'preview_image' => $previewImage,
            'main_image' => $mainImage,
        ];
    }

    private function checkAndCreateImage(string $imageName) : string
    {
        if(!file_exists($this->imagesFolderPath . $imageName)) {
            copy('database/factories/images/' . $imageName, $this->imagesFolderPath .$imageName);
        }
        return '/images/'.$imageName;
    }
}
