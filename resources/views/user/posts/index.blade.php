@extends('layouts.main')

@section('page.title', 'My posts')

@section('main.content')
    <x-title>
        {{ __('My posts') }}

        <x-slot name="right">
            <div class="justify-content-between">
                <x-button-link href="{{ route('user.posts.create') }}">
                    {{ __('Create') }}
                </x-button-link>
            </div>
        </x-slot>
    </x-title>

    @if(empty($posts))
        There are no posts
    @else
        <div class="row">
            @foreach($posts as $post)
                <div class="mb-3 h6">
                    <div>
                        <h5>
                            <a href="{{ route('user.posts.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </h5>

                        <div class="small text-muted">
                            {{ now()->format('d.m.Y h:i:s') }}
                        </div>

                        <p>
                            {!! $post->content !!}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    {{--        @json($foo)--}}
    {{--        @foreach($posts as $posts)--}}
    {{--            {{ $posts }}--}}
    {{--        @endforeach--}}
@endsection
