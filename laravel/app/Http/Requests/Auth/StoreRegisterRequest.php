<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'firstName' => ['required','string','min:2','max:50'],
            'lastName' => ['required','string','min:2','max:50'],
            'email' => ['required','email','max:100','unique:users,email'],
            'photo' => ['nullable','image','mimes:jpg,jpeg,png','max:2048'],
            'password' => ['required','string','min:8','confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'First name is required',
            'lastName.required' => 'Last name is required',
            'email.unique' => 'Email already exists',
            'password.confirmed' => 'Passwords do not match',
            'photo.image' => 'Photo must be an image'
        ];
    }
}
