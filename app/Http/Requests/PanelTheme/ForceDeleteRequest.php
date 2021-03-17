<?php

namespace App\Http\Requests\PanelTheme;

use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermission('forceDelete.panel_themes');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'slug' => ['string', 'min:3', 'max:255', 'required']
        ];
    }
}
