<?php

namespace App\Http\Requests\Auth\API;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**K
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'identifier' => ['string', 'min:3', 'max:191', 'required'],
            'password' => ['string', 'min:3', 'max:191', 'required'],
            'device_name' => ['string', 'min:3', 'max:100', 'required'],
            'remember' => ['boolean'],
        ];
    }
}
