<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome' => ['required', 'min:3'],
            'description' => ['max:255'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório e precisa de pelo menos 3 caracteres',
            'nome.min' => 'O nome precisa de pelo menos 3 caracteres',
           // 'description.required' => 'O campo descrição é obrigatório e precisa de pelo menos 5 caracteres',
            'description.max' => 'A descrição pode ter no maximo 255 caracteres',
        ];
    }
}
