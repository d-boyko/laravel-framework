@extends('layouts.main')

@section('page.title', 'Change the post')

@section('main.content')
    <x-title>
        {{ __('Change the posts') }}

        <x-slot name="link">
            <a href="{{ route('user.posts.show', $post->id) }}">
                {{ __('Back') }}
            </a>
        </x-slot>
    </x-title>

    <x-post.form action="{{ route('user.posts.update', $post->id) }}" method="POST" :post="$post">
        <x-button type="submit">
            {{ __('Save') }}
        </x-button>
    </x-post.form>
@endsection
