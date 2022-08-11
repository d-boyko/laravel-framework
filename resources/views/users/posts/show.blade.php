@extends('layouts.main')

@section('page.title', 'Your post')

@section('main.content')
    <x-title>
        {{ __('Your post') }}

        <x-slot name="right">
            <x-button-link href="{{ route('users.posts') }}">
                {{ __('Back') }}
            </x-button-link>

            <br>
            <br>

            <x-button-link href="{{ route('users.posts.edit', $post->id) }}">
                {{ __('Edit') }}
            </x-button-link>
        </x-slot>
    </x-title>

    <div class="mb-3 h6">
        <div>
            <h5>
                {{ $post->title }} | {{ $post->id }}
            </h5>

            <div class="small text-muted">
                {{ now()->format('d.m.Y h:i:s') }}
            </div>

            <div class="pt-3">
                {!! $post->content !!}
            </div>
        </div>
    </div>
@endsection
