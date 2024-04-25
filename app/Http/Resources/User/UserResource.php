<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->user,
            'surname' => $this->surname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'age' => $this->age,
            'address' => $this->address,
            'gender' => $this->gender,
            'role_id' => $this->role_id
        ];
    }
}
