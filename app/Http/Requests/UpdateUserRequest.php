<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:250',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:250',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
            'password' => [
                'nullable',
                Rule::requiredIf($this->password !== null),
                'string',
                'min:8',
                'max:30',
                Rule::when(!$this->password !== null, 'confirmed')
            ],
        ];
    }
}
