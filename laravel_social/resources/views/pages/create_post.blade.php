@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('submit_post')}}">

        @csrf
        @method('POST')

        <label for="title">Title</label>
        <input id="title" type="text" name="title">

        <label for="content">Content</label>
        <textarea id="content"name="content" rows=4 cols=50></textarea>

        <button type="submit">Submit</button>

    </form>

@endsection