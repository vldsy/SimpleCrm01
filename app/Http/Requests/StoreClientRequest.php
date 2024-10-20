<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClientRequest extends FormRequest
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
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'email', Rule::unique('clients')],
            'contact_phone_number' => ['nullable'],
            'company_name' => ['required', 'string'],
            'company_address' => ['nullable'],
            'company_city' => ['nullable'],
            'company_zip' => ['integer', 'nullable'],
            'company_vat' => ['numeric', 'nullable'],
        ];
    }
}
