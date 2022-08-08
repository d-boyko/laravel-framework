@extends('layouts.base')

@section('page.title')
    Users
@endsection

@section('content')
    @if(empty($response))
        There are no users
    @else
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
@endsection
