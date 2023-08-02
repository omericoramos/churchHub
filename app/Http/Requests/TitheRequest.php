<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitheRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'value' => ['required'],
            'date' => ['required', 'min:10', 'max:10'],
            'memberId' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'value.required' => 'Digite um valor válido',
            'date.required' => 'Digite uma data válida',
            'date.min' => 'Digite uma data válida',
            'date.max' => 'Digite uma data válida',
            'memberId.required' => 'Selecione um funcionário',
        ];
    }
}
