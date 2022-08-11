@extends('layouts.main')

@section('page.title', $post->title)

@section('main.content')
    <x-title>
        {{ $post->title }}

        <x-slot name="link">
            <a href="{{ route('blog') }}">
                {{ __('Back') }}
            </a>
        </x-slot>
    </x-title>

    {!! $post->content !!}
@endsection
