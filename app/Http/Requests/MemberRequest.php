<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name' => ['required', 'min:2'],
            'email' => ['nullable', 'min:9', 'email','unique:members'],
            'birthDate' => ['required', 'min:10', 'max:10'],
            'affiliationDate' => ['required', 'min:10', 'max:10'],
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Digite o nome do membro',
            'name.min' => 'O nome deve contes pelo menos 2 caracteres',
            'email.min' => 'O email deve conter no minimo 9 caracteres',
            'email.email' => 'Digite um email valido',
            'email.unique' =>'Este email já esta cadastrado',
            'birthDate.required' => 'A data de nascimento é obrigatórioa',
            'birthDate.min' => 'A data esta incorreta',
            'birthDate.max' => 'A data esta incorreta',
            'affiliationDate.required' => 'A data de filiação é obrigatórioa',
            'affiliationDate.min' => 'A data esta incorreta',
            'affiliationDate.max' => 'A data esta incorreta',
        ];
    }
}
