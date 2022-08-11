@extends('layouts.main')

@section('page.title', 'Create a posts')

@section('main.content')
    <x-title>
        {{ __('Create a posts') }}

        <x-slot name="link">
            <a href="{{ route('user.posts') }}">
                {{ __('Back to home') }}
            </a>
        </x-slot>
    </x-title>

    <x-post.form action="{{ route('user.posts.store') }}" method="POST">
        <x-button type="submit">
            {{ __('Create a posts') }}
        </x-button>
    </x-post.form>
@endsection
