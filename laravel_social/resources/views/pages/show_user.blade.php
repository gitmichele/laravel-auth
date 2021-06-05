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
        @foreach ($this_user -> posts as $post)
            <li>
                <h3>
                    {{ $post -> title }}
                </h3>
                <div>
                    {{ $post -> content }}
                </div>
            </li>
        @endforeach
    </ul>

@endsection