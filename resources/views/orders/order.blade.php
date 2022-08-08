@extends('layouts.base')

@section('page.title')
    {{ $id->name }}
@endsection

@section('content')
    <div>
        {{ $id->name }}
        {{ $id->cost }}
        {{ $id->number }}
    </div>
@endsection
