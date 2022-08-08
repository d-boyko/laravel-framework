@extends('layouts.base')

@section('content')
    <a href="{{ route('blog') }}">To main page</a>

    <h1>{{ $post->title }}</h1>

    <h3>
        <p>
            {!! $post->content !!}
        </p>
    </h3>
@endsection
