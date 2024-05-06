<?php

namespace App\Http\Requests\Admin\User;

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
        // TODO: добавить возможность изменять пароль
        return [            
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'patronymic' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user)],
            'age' => ['nullable', 'integer'],
            'address' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'integer'],
            'phone' => ['nullable', 'string', 'max:11'],
            'role_id' => ['nullable', 'integer'],
            'active' => ['nullable', 'boolean']
        ]; 
    }
}
