<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'contact_email' => 'nullable | email',
                'business_name' => 'nullable'
            ];
        } elseif ($this->isMethod('put')) {
            return [
                'contact_email' => 'nullable | email',
                'business_name' => 'required'
            ];
        }
    }
}
