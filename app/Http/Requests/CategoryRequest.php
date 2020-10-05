<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'nombre' => 'required|string|max:255|regex:/^[a-zñA-ZÑáéíóúÁÉÍÓÚ\s]+$/',
        ];
    }

    public function messages()
    {
        return [
          'required' => 'El campo es obligatorio.',
          'nombre.regex' =>'Puede utilizar solo letras y espacios.',
        ];
    }
}
