<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCollection extends FormRequest
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
            'name' => 'required|min:4|unique:collections,name,' . $this->route('collection')->id,
            'description' => 'nullable',
        ];
    }
    

    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.min' => 'El campo Nombre debe tener al menos 4 caracteres.',
            'name.unique' => 'El nombre de la colección ya existe, elija otro nombre.',
        ];
    }
}
