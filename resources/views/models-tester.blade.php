@extends('layouts.base')

@section('page.title')
    Testing models
@endsection

@section('content')
    ID: {{ $response->title }}
    Content: {{ $response->content }}
    <br>
@endsection
