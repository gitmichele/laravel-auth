<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use App\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comment::class, 200) -> make()
            -> each(function($comment) {

            $user = User::inRandomOrder() -> first();
            $post = Post::inRandomOrder() -> first();

            $comment -> user() -> associate($user);
            $comment -> post() -> associate($post);

            $comment -> save();
        });
    }
}
