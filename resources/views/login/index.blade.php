@extends('layouts.auth')

@section('page.title')
    Login
@endsection

@section('auth.content')
    <x-card>
        <div class="card">

            <x-card-header>
                <x-card-title>
                    <div class="card-body">
                        {{ __('Logging in') }}
                    </div>
                </x-card-title>

                <x-slot name="right">
                    <a href="{{ route('register') }}">
                        {{ __('Registration') }}
                    </a>
                </x-slot>
            </x-card-header>

            <x-card-body>
                <x-form action="{{ route('login.store') }}" method="POST">
                    <div class="card-body">

                        <x-form-item>
                            <div class="mb-3">
                                <x-label required>
                                    {{ __('Email') }}
                                </x-label>
                                <x-input name="email" autofocus></x-input>
                            </div>
                        </x-form-item>

                        <x-form-item>
                            <div class="mb-3">
                                <x-label required>
                                    {{ __('Password') }}
                                </x-label>
                                <x-input name="password"></x-input>
                            </div>
                        </x-form-item>

                        <x-form-item>
                            <x-checkbox type="checkbox">
                                {{ __('Remember me')  }}
                            </x-checkbox>
                        </x-form-item>

                        <x-button type="submit">
                            {{ __('Login') }}
                        </x-button>

                    </div>
                </x-form>
            </x-card-body>
        </div>
    </x-card>
@endsection
