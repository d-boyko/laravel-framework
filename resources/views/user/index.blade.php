@extends('layouts.main')

@section('page.title', 'Users')

@section('main.content')
    <x-title>
        {{ __('List of users') }}
    </x-title>

    @if(empty($response))
        {{ __('There are no users.') }}
    @else
        <div class="row">
            @foreach($response as $user)
                <div class="col-12 col-md-4">
                    <x-card>
                        <x-card-body>
                            <div>
                                <h5>
                                    <a href="{{ route('users.show', $user->id) }}">
                                        {{ $user->name }}
                                    </a>
                                </h5>

                                <div class="small text-muted">
                                    {{ now()->format('d.m.Y h:i:s') }}
                                </div>

                                <p>
                                    {{ $user->email }}
                                </p>
                            </div>
                        </x-card-body>
                    </x-card>
                </div>
            @endforeach
        </div>
    @endif
@endsection
