@extends('layouts.app')

@section('content')
<h2>Posts for {{ $this_topic -> name }}</a></h2>
<br>
<ul>
    @foreach ($this_topic -> posts as $post)
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
@endsection