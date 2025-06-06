<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            /** @example John Doe */
            'name' => ['required', 'string', 'max:255'],
            /** @example johndoe@email.com */
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            /** @example password */
            'password' => ['required', 'string', 'min:8'],
        ];
    }
}
