<?php

namespace App\Http\Requests\Admin\Color;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'id' => ['nullable', 'integer', Rule::unique('colors')->ignore($this->color)],
            'code' => [
                'required',
                Rule::unique('colors')->ignore($this->color),
                'regex:/^[A-Fa-f0-9]{6}|[A-Fa-f0-9]{3}$/'
            ],
            'title' => ['required', 'string', 'max:255', Rule::unique('colors')->ignore($this->color)]
        ];
    }
}
