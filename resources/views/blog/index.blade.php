@extends('layouts.main')

@section('main.content')
    <x-title>
        {{ __('All blogs') }}
    </x-title>
        @if(empty($posts))
            There are no posts
        @else
        <div class="row">
            @foreach($posts as $post)
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
{{--        @json($foo)--}}
{{--        @foreach($posts as $post)--}}
{{--            {{ $post }}--}}
{{--        @endforeach--}}
@endsection
