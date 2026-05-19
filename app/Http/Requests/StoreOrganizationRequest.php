<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'country_code' => ['required', 'string', 'max:5'],
            'currency_code' => ['required', 'string', 'max:5'],
            'state_id' => ['nullable', 'exists:states,id'],
            'gstin' => ['nullable', 'string', 'max:20', 'unique:organizations,gstin'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string'],
            'financial_year_start_month' => ['required', 'integer', 'between:1,12'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
