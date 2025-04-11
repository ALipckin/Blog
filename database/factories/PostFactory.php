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

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagePath = 'storage/app/public/images';

        return [
            'title' => fake()->name(),
            'content' => fake()->text(),
            'category_id' => Category::factory()->create()->id,
            'preview_image' => '/images/cat-preview.jpg',
            'main_image' => '/images/cat-main.jpg',
        ];
    }
}
