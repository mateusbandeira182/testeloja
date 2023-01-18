<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImagesProductRequest extends FormRequest
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
            'images' => ['required', 'max:3'],
            'images.*' => ['mimes:png,jpg,webp'],
        ];
    }

    public function messages()
    {
        return [
            'images.required' => 'Imagens do produto são necessárias',
            'images.mime' => 'São aceitos apenas imagens no formato JPG e PNG',
            'images.max' => 'O produto pode conter no máximo 3 imagens',
        ];
    }
}
