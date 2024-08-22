<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => 'required|string|max:250',
            'body' => 'required|string|max:5000',
            'published_at' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'ต้องกรอกชื่อเรื่อง',
            'title.string' => 'ชื่อเรื่องต้องเป็นข้อความ',
            'title.max' => 'ชื่อเรื่องต้องมีความยาวไม่เกิน :max อักษร',
        ];
    }
}
