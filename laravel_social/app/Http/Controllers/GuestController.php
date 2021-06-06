<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class GuestController extends Controller
{
    public function welcome() {

        $posts = Post::all() -> reverse();

        return view('pages.welcome', compact('posts'));
    }
}
