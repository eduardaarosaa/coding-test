<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplier extends FormRequest
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
            'name'          => 'required|min:3|max:100',
            'address'       => 'required',
            'number'        => 'required|min:1',
            'neighborhood'  => 'required|min:3|max:100',
            'city'          => 'required|min:3|max:100',
            'state'         => 'required|min:3|max:100',
            'phone'         => 'required|min:10'
        ];
    }

  public function messages()
    {

    return [
        'name.required' => 'O campo nome do fornecedor é obrigatório!',
        'name.min'=>'Poucos caractéres no campo nome, mínimo 3',
        'name.max'=>'Você utrapassou a quantidade de caractéres, máximo 100',
        'address.required'  => 'O campo endereço é obrigatório!',
        'number.required'=>'O campo número é obrigatório!',
        'number.min'=>'Poucos caractéres no campo número,mínimo 1',
        'neighborhood.required'=>'O campo bairro é obrigatório',
        'neighborhood.min'=>'Poucos caractéres no campo bairro, mínimo 3',
        'city.required'=>'O campo cidade é obrigatório!',
        'city.min'=>'Poucos caractéres no campo cidade, mínimo 3',
        'state.required'=>'O campo estado é um campo obrigatório!',
        'state.min'=>'Poucos caractéres no campo estado, mínimo 3',
        'state.max'=>'Você ultrapassou a quantidade de caractéres, máximo 100',
        'phone.required'=>' O campo telefone é um campo obrigatório',
        'phone.min'=>'Poucos caractéres no campo telefone, mínimo 10'

    ];

    }
}
