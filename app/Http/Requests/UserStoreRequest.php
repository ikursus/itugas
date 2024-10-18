<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email:filter,unique:users,email'],
            'jawatan_id' => 'nullable|sometimes|integer',
            'password' => 'required|confirmed|min:3',
            'nric' => 'required|digits:12,unique:users,no_ic',
            'no_staff' => 'required|digits:4,unique:users,no_staff',
            'no_phone' => 'required',
            'unit_id' => 'nullable|sometimes|integer',
            'bahagian_id' => 'nullable|sometimes|integer',
            'level' => 'required|integer',
            'role' => 'required'
        ];

    }

    public function messages(): array
    {
        return [
            'name.required' => 'Sila isi nama',
            'email.required' => 'Sila isi email',
            'jawatan_id.required' => 'Sila pilih jawatan',
            'password.required' => 'Sila isi kata laluan',
            'password.confirmed' => 'Kata laluan tidak sama',
            'password.min' => 'Kata laluan mestilah sekurang-kurangnya 3 aksara',
            'no_staff.digits' => 'Nombor staff mestilah sekurang-kurangnya 4 aksara',
        ];
    }
}
