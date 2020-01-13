<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'quant'=> 'required',
            'supplier_id'=>'required',
            'image'=>'image|required'
        ];
    }

    public function messages()
    {
    return [
        'name.required' => 'O campo nome é um campo obrigatório!',
        'name.min'=>'Poucos caractéres no campo nome, mínimo 3',
        'name.max'=>'Você ultrapassou a quantidade de caractéres do campo nome, máximo 100',
        'quant.required'  => 'O campo quantidade é um campo obrigatório!',
        'supplier_id.required'=>'O campo fornecedor é obrigatório!',
        'image.required'=>'O campo imagem é um campo obrigatório!'
    ];
    }
}
