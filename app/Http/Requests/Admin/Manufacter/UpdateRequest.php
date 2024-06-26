<?php

namespace App\Http\Requests\Admin\Manufacter;

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
            'id' => ['nullable', 'integer', Rule::unique('manufacters')->ignore($this->manufacter)],
            'title' => ['required', 'string', Rule::unique('manufacters')->ignore($this->manufacter), 'max:255']
        ];
    }
}
