<?php

namespace App\Http\Requests\RegisterProcess;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $name
 * @property $email
 * @property $password
 */
class UserRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:100'],
            'password' => ['required', 'string'],
        ];
    }
}
