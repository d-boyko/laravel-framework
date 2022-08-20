@extends('layouts.main')

@section('page.title', 'Daniil Boyko')

@section('main.content')
    <x-title>
        {{ __('List of posts') }}
    </x-title>

    @if(empty($response))
        {{ __('There are no posts.') }}
    @else
        <div class="row">
            @foreach($response as $post)
                <div class="col-12 col-md-4">
                    <x-card>
                        <x-card-body>
                            <div>
                                <h5>
                                    <a href="{{ route('blog.show', $post->id) }}">
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
                        </x-card-body>
                    </x-card>
                </div>
            @endforeach
        </div>
    @endif
@endsection
