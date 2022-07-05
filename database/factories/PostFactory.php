<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $faker=\Faker\Factory::create();
        return [
            //
        //     'user_id' =>\App\Models\User::factory(),

                'user_id'=>$faker->numberBetween(1,5),
               'title'=>$faker->sentence,
               'post_image'=>$faker->imageUrl(width:'900', height:'300'),
               'body'=>$faker->paragraph
        ];      
        
    }
}
