<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1', 'max:50'],
            'description' => ['required', 'string', 'min:1', 'max:255'],
            'quantity' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'double', 'min:0.01'],
            'images' => ['required', 'min:1', 'max:3']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do produto é necessário',
            'name.string' => 'O nome deve ser texto',
            'name.min' => 'O tamanho mínimo para um nome é :min',
            'nome.max' => 'O produto só pode ter no máximo 50 caracteres',
            'description.required' => 'O produto precisa de descrição',
            'description.string' => 'A descrição deve ser texto',
            'description.min' => 'A descrição deve conter no mínimo :min',
            'description.max' => 'A descrição deve conter no máximo :max caracters',
            'quantity.required' => 'A quantidade é necessário',
            'quantity.integer' => 'A quantidade é um número intero',
            'quantity.min' => 'A quantidade deve ser no mínimo :min',
            'price.required' => 'É necessário atribuir um preço para o produto',
            'price.double' => 'É necessário um número decimal',
            'price.min' => 'o preço mínimo é :min',
            'images.required' => 'Imagens do produto são necessárias',
            'images.image' => 'Os arquivos devem ser de imagens',
            'images.min' => 'Deve ser no mínimo uma imagem',
            'images.max' => 'O produto pode conter no máximo 3 imagens'
        ];
    }
}
