<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'street' => 'required|string',
            'district' => 'required|string',
            'uf' => 'required|string|max:2',
            'city' => 'required|string',
            'cep' => [
                'required',
                'integer',
                'regex:/^\d{8}$/',
            ],
        ];
    }
}
