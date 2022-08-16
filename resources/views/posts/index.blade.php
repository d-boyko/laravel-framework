@extends('layouts.base')

@section('page.title')
    Posts
@endsection

@section('content')
    <div style="text-align: center;">
        @if(empty($posts))
            There are no users
        @else
            <h1>
                Posts
            </h1>
            @foreach($posts as $row)
                <div>
                    Name: {{ $row->name }}
                    <br>
                    Email: {{ $row->title }}
                    <br>
                    Password: {{ $row->content }}
                </div>
                <br>
                <br>
            @endforeach

        @endif
    </div>
@endsection
