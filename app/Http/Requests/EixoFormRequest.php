<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EixoFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'txtSigla' => 'required|min:2',
            'txtEixo' => 'required|min:5'
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'txtSigla.min' => 'O campo Sigla precisa ter ao menos 2 caracteres',
            'txtEixo.min' => 'O campo Descrição precisa ter ao menos 5 caracteres'
        ];
    }
}
