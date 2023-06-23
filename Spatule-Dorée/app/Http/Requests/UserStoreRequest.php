<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        $userId = $this->user->id ?? null; // Identifiant de l'utilisateur

        return [
            "name" => "required|string|max:100",
            "email" => "required|unique:users,email" . ($userId ? "," . $userId : ""),
            "password" => "required|min:8"
        ];
    }
}
