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
        $this_user_posts = $this_user -> posts() -> get() -> reverse();

        return view('pages.show_user', compact('this_user','this_user_posts'));

    }

    public function show_topic($id) {
    
        $this_topic = Topic::findOrFail($id);
        $this_topic_posts = $this_topic -> posts() -> get() -> reverse();
    
        return view('pages.show_topic', compact('this_topic', 'this_topic_posts'));
    }

    public function create_post() {
        
        $topics = Topic::all();

        return view('pages.create_post', compact('topics'));
    }

    public function submit_post(Request $request) {

        $validate_data = $request -> validate ([

            'title' => ['required', 'max:128'],
            'content' => ['required'],
            ]);       

    
        $user_id = Auth::user() -> id;
        $user = User::findOrFail($user_id);

        $post = Post::make($validate_data);
        $post -> user() -> associate($user);
        $post -> save();

        $post -> topics() -> attach($request -> get('topic_id'));
        $post -> save();

        return redirect() -> route('show_user', $user_id);
    }

    public function delete($id) {

        $post = Post::findOrFail($id);

        $post -> delete = true;
        $post -> save();

        return redirect() -> back();
    }

    public function update($id) {

        $post = Post::findOrFail($id);
        $topics = Topic::all();

        return view('pages.update_post', compact('post', 'topics'));
    }

    public function submit(Request $request, $id) {

        $validate_data = $request -> validate ([

            'title' => ['required', 'max:128'],
            'content' => ['required'],
            ]);       

        $post = Post::findOrFail($id);
        $post -> update($validate_data);
        
        $post -> topics() -> sync($request -> get('topic_id'));
        $post -> save();

        return redirect() -> route('show_user', Auth::user() -> id);
    }
}