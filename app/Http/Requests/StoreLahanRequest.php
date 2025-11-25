<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLahanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_lahan' => 'required|string|max:100',
            'luas_lahan' => 'required|numeric',
            'jenis_tanah' => 'required|string',
            'ph_tanah' => 'required|numeric|between:0,14',
            'kelembapan' => 'required|numeric',
            'koordinat' => 'required|string'
        ];
    }
}
