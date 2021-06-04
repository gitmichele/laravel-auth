<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Comment extends Model
{
    protected $fillable = [

        'content', 'deleted', 'post_id', 'user_id',
    ];

    public function user() {

        return $this -> belongsTo(User::class);
    }

    public function post() {

        return $this -> belongsTo(Post::class);
    }
}
