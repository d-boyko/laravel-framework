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
                                    <x-form action="{{ route('register.store') }}" method="POST">
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
                                                        {{ __('Name') }}
                                                    </x-label>
                                                    <x-input name="name"></x-input>
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
                                                <div class="mb-3">
                                                    <x-label required>
                                                        {{ __('Confirm password') }}
                                                    </x-label>
                                                    <x-input name="password_confirmation"></x-input>
                                                </div>
                                            </x-form-item>

                                            <x-form-item>
                                                <div class="mb-3">
                                                    <x-label required>
                                                        {{ __('Age') }}
                                                    </x-label>
{{--                                                    <x-input name="age" value="{{ request()->old('age') }}"></x-input>--}}
                                                    <x-input name="age"></x-input>
                                                </div>
                                            </x-form-item>

                                            <x-form-item>
                                                <x-checkbox name="agreement">
                                                    {{ __('I agree with saving and using personal data')  }}
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