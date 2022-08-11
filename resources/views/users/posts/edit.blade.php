@extends('layouts.main')

@section('page.title', 'Edit the post')

@section('main.content')
    <x-title>
        {{ __('Edit the post') }}
    </x-title>

    <x-posts.form action="{{ route('users.posts.store', $post->id) }}" :post="$post">
        Edit
    </x-posts.form>
@endsection
