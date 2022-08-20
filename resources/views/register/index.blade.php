@extends('layouts.auth')

@section('page.title')
    Registration
@endsection

@section('auth.content')
<x-card>
    <div class="card">
        <x-card-header>
            <x-card-title>
                <div class="card-body">
                    {{ __('Registration') }}
                </div>
            </x-card-title>

            <x-slot name="right">
                <a href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            </x-slot>
        </x-card-header>

        <x-card-body>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <x-form action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-form-item>
                        <div class="mb-3">
                            <x-label required>
                                {{ __('Email') }}
                            </x-label>
                            <x-input name="email" autofocus></x-input>
{{--                            @error('email')--}}
{{--                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
                        </div>
                    </x-form-item>

                    <x-form-item>
                        <div class="mb-3">
                            <x-label required>
                                {{ __('Name') }}
                            </x-label>
                            <x-input name="name"></x-input>
{{--                            @error('name')--}}
{{--                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
                        </div>
                    </x-form-item>

                    <x-form-item>
                        <div class="mb-3">
                            <x-label required>
                                {{ __('Password') }}
                            </x-label>
                            <x-input name="password"></x-input>
{{--                            @error('password', 'mixed')--}}
{{--                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
                        </div>
                    </x-form-item>

                    <x-form-item>
                        <div class="mb-3">
                            <x-label required>
                                {{ __('Confirm password') }}
                            </x-label>
                            <x-input name="password_confirmation"></x-input>
{{--                            @error('confirmed')--}}
{{--                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
                        </div>
                    </x-form-item>

                    <x-button type="submit">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </x-form>
        </x-card-body>
    </div>
</x-card>
@endsection
