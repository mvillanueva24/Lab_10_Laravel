<?php

namespace Database\Factories;

use App\Models\Post;
//use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;
    //public $user = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$image = $this->faker->image(400, 300, null, false);
        
        return [
            //$id = factory(\App\User::class)->id,
            'title' => $this->faker->sentence(5),
            'image' => $this->faker->image(public_path('storage/posts'), 400, 300, null, false),
            //'image' => $this->faker->image('public/storage/posts', 400, 300, null, false),

            //'image' => Storage::disk('public')->put('posts', $image),
            //'image' => $this->faker->file('image')->store(
            //    'storage/posts/' . Auth::id(),
            //    'public'),
            
            //'image' => $this->faker->Storage::disk('public')->put('posts', $image),
            //image(storage_path('public/app/posts'),400, 300, null, false),
            //'image' => 'img/' . $this->faker->image('public/img', 400, 300, null, false),
            'content' => $this->faker->paragraph(3),
        ];
    }
}
