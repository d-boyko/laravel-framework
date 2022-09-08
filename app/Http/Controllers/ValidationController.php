<?php

namespace App\Http\Controllers;

use App\Rules\Phone;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use JetBrains\PhpStorm\NoReturn;

class ValidationController extends Controller
{
    #[NoReturn] public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:50'], // Daniil
            'last_name' => ['nullable', 'string', 'max:50'], // Boyko
            'age' => ['nullable', 'integer', 'min:18', 'max:150'], // 19
            'amount' => ['required', 'numeric', 'min:1', 'max:10000000'], // 123 OR 123.45
            'gender' => ['nullable', 'string', 'in:male,female'],
            'zip' => ['required', 'digits:6'], // 123456
            'subscription' => ['nullable', 'boolean'], // true/false/1/0
            'agreement' => ['accepted'], // true/1/yes
//            'password' => ['required', 'string', 'min:7', 'confirmed'], // password_confirmation
            'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols(), 'confirmed'], // Secret123!
            'current_password' => ['required', 'string', 'current_password'], // current password when the user is logged in
            'email' => ['required', 'string', 'max:100', 'email', 'exists:users'], // mail@example.com
//            'email' => ['required', 'string', 'max:100', 'email', 'exists:users,{field -> default: <-value 'email'}'], // mail@example.com
//            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'country_id' => ['required', 'integer', Rule::exists('countries', 'id')->where('active', true)],
//            'phone' => ['required', 'string', 'unique:users,phone'],
            'phone' => ['required', 'string', new Phone, Rule::unique('users', 'phone')->ignore($user)],
            'website' => ['nullable', 'string', 'url'], // https://example.com
            'uuid' => ['nullable', 'string', 'uuid'], // sdfsdf-sdfsdf-sdfsdf-sdfsdf
            'ip' => ['nullable', 'string', 'ip'], // 127.0.0.1
            'avatar' => ['nullable', 'file', 'image', 'max:1024'], // 1Mb
            'birth_date' => ['nullable', 'string', 'date'], // 2021-10-09/09-10-2021 12:30:00
            'start_date' => ['required', 'string', 'data', 'after_or_equal:today'],
            'end_date' => ['required', 'string', 'data', 'after:start_date'],
            'services' => ['nullable', 'array', 'min:1', 'max:10'], // [1,2,3,4,5]
            'services.*' => ['required', 'integer'], // [1,2,3,4,5]
            'delivery' => ['required', 'array', 'size:2'], // ['date' => '2021-10-09', 'time' => '12:30:00']
            'delivery.date' => ['required', 'string', 'date_format:Y.m.d'], // 2021-10-09
            'delivery.time' => ['required', 'string', 'date_format:H:i:s'], // 12:30:00
            'secret' => ['required', 'string', function ($attribute, $value, Closure $fail) {
                if ($value !== config('example.secret')) {
                    $fail(__('Wrong secret key.'));
                }
            }],
        ]);

        dd($validated);
    }
}
