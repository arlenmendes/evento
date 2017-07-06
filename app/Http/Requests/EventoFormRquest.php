<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoFormRquest extends FormRequest
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
            'titulo'        => 'required|min:3',
            'descricao'     => 'required|min:3',
            'data'          => 'required|min:10',
            'horario'       => 'required|min:8',
            'duracao'       => 'required|min:8',
            'vagas'         => 'required',
            'vagas_espera'  => 'required',
            'tipo_evento_id'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'tipo_evento_id.required' => 'O campoo Tipo é obrigatório.'
        ];
    }
}
