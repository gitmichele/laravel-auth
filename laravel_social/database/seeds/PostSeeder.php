<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 100) -> make()
            -> each(function($post) {

            $user = User::inRandomOrder() -> first();
            $post -> user() -> associate($user);

            $post -> save();
        });
    }
}
