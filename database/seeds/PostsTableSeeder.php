<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 10; $i++) {
            # code...
            $new_post = new Post();
            $new_post->title = "Title" . ($i + 1);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = ($i + 1) . "Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae accusamus praesentium odit at. Aliquid quos molestias neque tempora? Praesentium, quas voluptas porro vero possimus sint modi. Laboriosam atque sit unde!";
            $new_post->save();
        }
    }
}
