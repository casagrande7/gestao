<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GestaoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|max:20|min:3',
            'descricao' => 'required|max:1500|min:200',
            'data_inicio' => 'required|date',
            'data_termino' => 'required|date',
            'valor_projeto' => 'required|decimal:2',
            'status' => 'required|max:25|min:5'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages(){
        return[
            'titulo.required' => "O campo Título é obrigatório",
            'titulo.max' => "O campo Título deve conter no máximo 20 caracteres",
            'titulo.max' => "O campo Título deve conter no mínimo 3 caracteres",
            'descricao.required' => "O campo Descrição é obrigatório",
            'descricao.max' => "O campo Descrição deve conter no máximo 1500 caracteres",
            'descricao.min' => "O campo Descrição deve conter no mínimo 200 caracteres",
            'data_inicio.required' => "O campo Data Inicial é obrigatório",
            'data_inicio.date' => 'O campo Data Inicial deve conter apenas data',
            'data_termino.required' => 'O campo Data Término é obrigatório',
            'data_termino.date' => 'O campo Data de Término deve conter apenas datas',
            'valor_projeto.required' => 'O campo Valor Projeto é obrigatório',  
            'valor_projeto.decimal' => 'O campo Valor Projeto receberá apenas valores em decimais',
            'status.required' => 'O campo Status é obrigatório',
            'status.max' => 'O campo Status deve conter no máximo 25 caracteres',
            'status.min' => 'O campo Status deve conter no mínimo 5 caracteres'
        ];
    }
}

