<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;
use App\Topic;

class Post extends Model
{
    protected $fillable = [

        'title', 'content', 'delete', 'user_id'
    ];

    public function user() {

        return $this -> belongsTo(User::class);
    } 

    public function comments() {

        return $this -> hasMany(Comment::class);
    }

    public function topics() {

        return $this -> belongsToMany(Topic::class);
    }
}
