<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipanteFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'telefone'          => 'required|min:10|numeric',
            'cpf'               => 'required|min:11|numeric',
            'data_nascimento'   => 'required',
            'cidade'            => 'required|min:3',
            'curso'             => 'required',
            'instituicao'       => 'required',
            'matricula'         => 'required',
        ];
    }
}
