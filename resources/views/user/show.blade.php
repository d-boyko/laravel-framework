@extends('layouts.main')

@section('page.title', 'Your posts')

@section('main.content')
    <x-title>
        {{ $response->name }} [{{ $response->id }}]

        <x-slot name="link">
            <x-button-link href="{{ route('users.list') }}">
                {{ __('Back') }}
            </x-button-link>
        </x-slot>

    </x-title>

    <h2 class="h4">
        {{ $response->email }}
    </h2>

    <div class="small text-muted">
        {{ $response->created_at }}
    </div>

    <div class="pt-3">
        {{ $response->password }}
    </div>
@endsection
