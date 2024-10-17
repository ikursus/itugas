<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => ['required', 'email:filter'],
            'jawatan_id' => 'nullable|sometimes|integer',
            'password' => 'nullable|sometimes|confirmed|min:3',
            'nric' => 'required|digits:12',
            'no_staff' => 'required|digits:4',
            'no_phone' => 'required',
            'unit_id' => 'nullable|sometimes|integer',
            'bahagian_id' => 'nullable|sometimes|integer',
            'level' => 'required|integer'
        ];
    }
}
