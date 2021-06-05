<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>

    <body>

        @extends('layouts.app')

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('show_user', Auth::user() ->id) }}">
                                See your profile
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            <ul>
                @foreach ($posts as $post)
                    <li>
                        <h3>
                            Title:
                            {{ $post -> title }}
                        </h3>
                        <h4>
                            Topics: 
                            @foreach ($post -> topics as $topic)
                                <a href="{{ route('show_topic', $topic -> id) }}">
                                    {{ $topic -> name }}   
                                </a>
                                @if ($loop -> index < ($loop -> count - 1))
                                    -
                                @endif                             
                            @endforeach
                        </h4>
                        <div>
                            Content: {{ $post -> content }}
                        </div>
                        <br>
                        <ul>
                            @if (count($post -> comments) > 0)
                                Comments:
                            @endif
                            @foreach ($post -> comments as $comment)
                                <li>
                                    <a href="{{ route('show_user', $comment -> user -> id) }}">
                                        {{ $comment -> user -> name}}
                                    </a>
                                    <br>
                                    {{ $comment -> content }}
                                </li>
                            @endforeach
                        </ul>
                        <hr>
                    </li>
                @endforeach
            </ul>
        </div>
    </body>
</html>
