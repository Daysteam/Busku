<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'username' => 'required|min:5|unique:users,username,'. $this->user .',id',
            'email' => 'required|email|unique:users,email,'. $this->user . ',id',
            'password' => 'required|string|min:8'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username harus diisi',
            'username.min' => 'Username harus minimal 5 karakter',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus menggunakan @',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password harus diisi',
            'password.string' => 'Password harus berbentuk teks',
            'password.min' => 'Password harus minimal 8 karakter' 
        ];
    }
}
