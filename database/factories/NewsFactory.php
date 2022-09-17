<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->title;
        $category = Category::inRandomOrder()->first();
        $slug = SlugService::createSlug(News::class,'slug',$title);
        
        return [
            'title' => $title,
            'description' => $this->faker->text,
            'category_id' => $category->id,
            'slug' => $slug
        ];
    }
}
