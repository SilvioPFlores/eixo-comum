<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required',
            'sigla' => 'required',
            'nome' => 'required|min:5'
        ];
    }
    public function messages(): array
    {
        return [
            'id.required' => 'O campo código do curso é obrigatório',
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O campo Nome precisa ter ao menos 5 caracteres'
        ];
    }
}
