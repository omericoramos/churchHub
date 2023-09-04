<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryOfferRequest extends FormRequest
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
            'categoryStore' => ['required', 'min:3', 'max:30']
        ];
    }

    public function messages()
    {
        return [
            'categoryStore.required' => 'Digite um nome para a nova categoria',
            'categoryStore.min' => 'O nome da categoria deve conter mais de 3 caracteres',
            'categoryStore.max' => 'O nome da categoria deve conter menos de 30 caracteres'
        ];
    }
}
