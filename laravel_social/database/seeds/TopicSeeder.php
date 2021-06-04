<?php

use Illuminate\Database\Seeder;
use App\Topic;
use App\Post;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Topic::class, 10) -> create()
            -> each(function($topic) {

            $posts = Post::inRandomOrder() -> limit(rand(1, 30)) -> get();
            $topic -> posts() -> attach($posts);

            $topic -> save();
        });
    }
}
