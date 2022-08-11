@extends('layouts.main')

@section('page.title', 'Creating the post')

@section('main.content')
    <x-title>
        {{ __('Create the post') }}

        <x-slot name="right">
            <div class="justify-content-between">
                <x-button-link href="{{ route('users.posts') }}">
                    {{ __('Back') }}
                </x-button-link>
            </div>
        </x-slot>
    </x-title>

    <x-posts.form action="{{ route('users.posts.store') }}">
        Create
    </x-posts.form>
@endsection
