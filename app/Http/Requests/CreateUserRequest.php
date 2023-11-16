<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        return
            [
                'cpf' => 'required|cpf',
                'email' => 'required|email',
                'gender' => 'required|in:male,female',
                'birthday' => 'required|date',
                'name' => 'required|min:3',
                'lastname' => 'required|min:3'
            ];
    }

    public function messages(): array
    {
        return [
            "cpf.required" => "O campo CPF é obrigatório!",
            "email.required" => "O campo email é obrigatório!",
            "email.email" => "O campo email precisa receber um email válido!",
            "name.required" => "O campo name é obrigatório!",
            "name.min" => "O campo name precisa ter mais de 3 dígitos!",
            "lastname.required" => "O campo lastname é obrigatório!",
            "lastname.min" => "O campo lastname precisa ter mais de 3 dígitos!",
            "birthday.required" => "O campo birthday é obrigatório!",
            "birthday.date" => "O campo birthday precisa ser no formato 'MM/DD/YYYY'!",
            "gender.required" => "O campo gender é obrigatório!",
            "gender.in" => "O campo gender só aceitará 'male' ou 'female'"
        ];
    }
}
