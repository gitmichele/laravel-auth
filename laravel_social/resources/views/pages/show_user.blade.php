@extends('layouts.app')

@section('content')

    <h2>
        {{ $this_user -> name }}
    </h2>

    @if ($this_user -> id == Auth::user() ->id)
        <a href="{{ route('create_post') }}">
            New Post
        </a>
    @endif
        
    <div>
        {{ $this_user -> name }}'s posts:
    </div>

    <ul>
        @foreach ($this_user_posts as $post)
        @if ($post -> delete == false)
            <li>
                <h3>
                    {{ $post -> title }}
                </h3>
                <div>
                    {{ $post -> content }}
                </div>
                @if ($post -> user -> id == Auth::user() -> id)
                    <a href="{{ route('delete', $post -> id)}}">
                        Elimina
                    </a>
                @endif
            </li>
        @endif
        @endforeach
    </ul>

@endsection