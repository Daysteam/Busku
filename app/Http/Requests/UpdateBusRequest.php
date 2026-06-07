<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBusRequest extends FormRequest
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
            'user_id' => 'nullable|exists:users,id',
            'kode_bus' => [
                            'required',
                            'string',
                            Rule::unique('buses', 'kode_bus')->ignore($this->bus),
                        ],
            'nama_bus' => 'required|string',
            'jumlah_kursi' => 'required|numeric',
            'tipe_bus' => 'required|in:ekonomi,eksekutive,vip',
            'image' => 'nullable|image|mimes:png,jpg,svg,webp|max:2048'
        ];
    }

    public function messages():array
    {
        return [
            'user_id.exists' => 'Petugas tidak ada',
            'kode_bus.string' => 'Kode Bus harus berbentuk teks',
            'kode_bus.unique' => 'Kode Bus sudah ada',
            'kode_bus.required' => 'Kode Bus harus diisi',
            'nama_bus.required' => 'Nama Bus harus diisi',
            'nama_bus.string' => 'Nama Bus harus berbentuk teks',
            'jumlah_kursi.required' => 'Jumlah kursi harus diisi',
            'jumlah_kursi.numeric' => 'Jumlah kursi harus berbentuk angka',
            'tipe_bus.required' => 'Tipe Bus harus diisi',
            'tipe_bus.in' => 'Tipe Bus hanya boleh ekonomi,eksekutive,vip',
            'image.image' => 'Images harus berupa gambar',
            'image.mimes' => 'Images harus berupa png,jpg,svg atau webp',
            'image.max' => 'Images tidak boleh lebih dari 2MB'
        ];
    }
}
