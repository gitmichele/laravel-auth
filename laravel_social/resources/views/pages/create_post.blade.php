@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('submit_post')}}">

        @csrf
        @method('POST')

        <label for="title">Title</label>
        <input id="title" type="text" name="title">
        <br>
        <label for="content">Content</label>
        <textarea id="content"name="content" rows=4 cols=50></textarea>
        <br>
        @foreach ($topics as $topic)
        <input type="Checkbox" name="topic_id[]" value="{{ $topic -> id }}">{{ $topic -> name }} <br>
        @endforeach

        <button type="submit">Submit</button>

    </form>

@endsection