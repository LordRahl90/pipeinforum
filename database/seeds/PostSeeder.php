<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Post::class,50)->create()->each(function ($post){
            for ($i=0; $i<=rand(0,5); $i++){
                $post->images()->save(factory(\App\Models\PostImages::class)->make());
            }

            for ($i=1; $i<=rand(0,20); $i++){
                $post->comments()->save(factory(\App\Models\Comment::class)->make());
            }
        });
    }
}
