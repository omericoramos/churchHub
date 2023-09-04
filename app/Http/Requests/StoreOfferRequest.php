<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'value'=>['required'],
            'date'=>['required','min:10', 'max:10'],
            'memberId'=>['required'],
            'categoryOffer'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'value.required' => 'Digite o valor da oferta',
            'date.required' => 'Selecione uma data',
            'date.min' => 'Data invalida',
            'date.max' => 'Data invalida',
            'memberId.required' => 'Selecione um membro',
            'categoryOffer.required' => 'Selecione uma categoria'
        ];
    }
}
