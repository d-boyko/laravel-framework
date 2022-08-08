@extends('layouts.base')

@section('content')
    <h1>All blogs</h1>
{{--        @json($foo)--}}
{{--        @foreach($posts as $post)--}}
{{--            {{ $post }}--}}
{{--        @endforeach--}}

        @if(empty($posts))
            There are no posts
        @else
            @foreach($posts as $post)
                <div>
                    <h5>
                        <a href="{{ route('blog.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h5>

                    <p>
                        {!! $post->content !!}
                    </p>
                </div>
            @endforeach
        @endif
@endsection
