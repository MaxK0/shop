<?php

namespace App\Http\Requests\Admin\Color;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'id' => ['nullable', 'integer', 'unique:color'],
            'code' => [
                'required',
                'unique:colors',
                'regex:/^[A-Fa-f0-9]{6}|[A-Fa-f0-9]{3}$/'
            ],
            'title' => ['required', 'unique:colors', 'string', 'max:255']
        ];
    }
}
