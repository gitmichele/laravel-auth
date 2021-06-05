<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}