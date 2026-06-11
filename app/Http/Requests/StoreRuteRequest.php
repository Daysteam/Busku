<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRuteRequest extends FormRequest
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
            'bus_id' => 'required|exists:buses,id',
            'kota_tujuan' => 'required|string|different:kota_asal',
            'kota_asal' => 'required|string|different:kota_tujuan',
            'tanggal_berangkat' => 'required|date',
            'jam_berangkat' => 'required|date_format:H:i',
            'harga' => 'required|numeric|min:1000'
        ];
    }

    public function messages(): array
    {
        return [
            'bus_id.required' => 'Nama Bus Diperlukan',
            'bus_id.exists' => 'Nama Bus tidak ada',
            'kota_tujuan.required' => 'Kota Tujuan harus diisi',
            'kota_tujuan.string' => 'Kota Tujuan harus berbentuk teks',
            'kota_tujuan.different' => 'Kota asal dan kota tujuan tidak boleh sama.',
            'kota_asal.different' => 'Kota asal dan kota tujuan tidak boleh sama.',
            'kota_asal.required' => 'Kota Asal harus diisi',
            'kota_asal.string' => 'Kota Asal harus berbentuk teks',
            'tanggal_berangkat.required' => 'Tanggal Berangkat harus diisi',
            'tanggal_berangkat.date' => 'Tanggal Berangkat harus berbentuk tanggal',
            'jam_berangkat.required' => 'Jam Berangkat harus diisi',
            'jam_berangkat.date_format' => 'Jam Berangkat harus berbentuk jam:menit',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus berbentuk angka',
            'harga.min' => 'Harga minimal 1000',
        ];
    }
}
