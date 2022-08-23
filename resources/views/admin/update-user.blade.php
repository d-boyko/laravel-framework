@extends('layouts.auth')

@section('page.title')
    Updating user
@endsection

@section('auth.content')
    <x-card>
        <div class="card">
            <x-card-header>
                <x-card-title>
                    <div class="card-body">
                        {{ __('Update user info') }}
                    </div>
                </x-card-title>

                <x-slot name="right">
                    <a href="{{ route('admin.functions') }}">
                        {{ __('Back to the admin-menu') }}
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
                <x-form action="{{ route('admin.update-user-edit') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <x-form-item>
                            <div class="mb-3">
                                <x-label required>
                                    {{ __('ID') }}
                                </x-label>
                                <x-input name="id" autofocus></x-input>
                            </div>
                        </x-form-item>

                        <x-form-item>
                            <div class="mb-3">
                                <x-label required>
                                    {{ __('Name of the field') }}
                                </x-label>
                                <x-input name="field"></x-input>
                            </div>
                        </x-form-item>

                        <x-form-item>
                            <div class="mb-3">
                                <x-label required>
                                    {{ __('New Value to the field') }}
                                </x-label>
                                <x-input name="newValue"></x-input>
                            </div>
                        </x-form-item>

                        <x-button type="submit">
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </x-form>
            </x-card-body>
        </div>
    </x-card>
@endsection
