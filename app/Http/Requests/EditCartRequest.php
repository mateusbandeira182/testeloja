<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCartRequest extends FormRequest
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
            'quantity' => ['required', 'integer', 'min:1']
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'Um número é necessário para quantidade',
            'quantity.integer' => 'O número deve ser um inteiro',
            'quantity' => 'O menor número possivel é 1 (um)'
        ];
    }
}
