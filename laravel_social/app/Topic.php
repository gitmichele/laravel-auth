<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Topic extends Model
{
    protected $fillable = [

        'name', 'delete'
    ];

    public function posts() {

        return $this -> belongsToMany(Post::class);
    }
}
