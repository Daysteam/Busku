<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class UpdateAccountRequest extends FormRequest
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
            'username' => 'required|string|unique:users,username,' . auth()->user()->id . ',id',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id . ',id',
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8|different:current_password'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username harus diisi',
            'username.string' => 'Username harus berupa text',
            'username.unique' => 'Username sudah digunakan',
            'email.requird' => 'Email harus diisi',
            'email.email' => 'Email harus menggunakan @',
            'email.unique' => 'Email sudah digunakan',
            'current_password.required' => 'Password sekarang harus diisi',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Konfirmasi Password harus sama',
            'password.min' => 'Password minimal 8 karakter',
            'password.different' => 'Password lama dan baru tidak boleh sama'
        ];
    }
}
