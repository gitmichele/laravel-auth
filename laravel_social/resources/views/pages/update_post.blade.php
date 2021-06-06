@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('submit', $post -> id) }}">

        @csrf
        @method('POST')

        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{ $post -> title }}">
        <br>
        <label for="content">Content</label>
        <textarea id="content"name="content" rows=4 cols=50>{{ $post -> content }}</textarea>
        <br>
        @foreach ($topics as $topic)
        <input type="Checkbox" name="topic_id[]" value="{{ $topic -> id }}" 
        
        @foreach ($post -> topics as $post_topic)
            @if ($post_topic -> id == $topic -> id)
                checked
            @endif
        @endforeach
        
        >{{ $topic -> name }} <br>
        @endforeach

        <button type="submit">Submit</button>

    </form>

@endsection