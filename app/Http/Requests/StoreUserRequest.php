<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreUserRequest extends FormRequest
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
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah ada',  
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus menggunakan @',
            'email.unique' => 'Email sudah digunakan'
        ];
    }
}
