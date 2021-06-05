<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use App\Post;
use Illuminate\Support\Facades\Auth;

class LoggedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.logged_home');
    }

    public function new_user() {

        return view('pages.new_registration');
    }

    public function show_user($id) {

        $this_user = User::findOrFail($id);

        return view('pages.show_user', compact('this_user'));

    }

    public function show_topic($id) {
    
        $this_topic = Topic::findOrFail($id);
    
        return view('pages.show_topic', compact('this_topic'));
    }

    public function create_post() {
        
        return view('pages.create_post');
    }

    public function submit_post(Request $request) {

        $validate_data = $request -> validate ([

            'title' => ['required', 'max:128'],
            'content' => ['required']

            ]);       

            $user_id = Auth::user() -> id;
            $user = User::findOrFail($user_id);

            $post = Post::make($validate_data);
            $post -> user() -> associate($user);

            $post -> save();

            return redirect() -> route('show_user', $user_id);
        }
}