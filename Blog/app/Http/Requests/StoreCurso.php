<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
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
            'name' => 'required|max:10',
            'description' => 'required|min:10',
            'category' => 'required'
        ];
    }

    public function attributes() // nombres personalizados para los campos
    {
        return [
            'name' => 'nombre del curso',
        ];
    }

    public function messages() // mensajes de error personalizados
    {
        return [
            'description.required' => 'Debe ingresar una descripción para el curso',
        ];
    }
}
