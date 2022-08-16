@extends('layouts.base')

@section('page.title')
    Users
@endsection

@section('content')
    <div style="text-align: center;">
        @if(empty($response))
            There are no users
        @else
            <h1>
                Users
            </h1>

            @foreach($response as $row)
                <div>
                    Name: {{ $row->name }}
                    <br>
                    Email: {{ $row->email }}
                    <br>
                    Password: {{ $row->password }}
                </div>
                <br>
                <br>
            @endforeach
        @endif
    </div>
@endsection
