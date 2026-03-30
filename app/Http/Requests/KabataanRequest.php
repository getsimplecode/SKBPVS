<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KabataanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstname'            => 'required|string|max:255',
            'middlename'           => 'nullable|string|max:255',
            'lastname'             => 'required|string|max:255',
            'suffix'               => 'nullable|string|max:10',

            // If you are computing age automatically, you can remove this.
            'age'                  => 'nullable|integer|min:0|max:120',

            'gender'               => 'required|in:Male,Female,Other',

            'education_background' => 'nullable|string|max:255',
            'work_status'          => 'nullable|string|max:255',

            'purok'                => 'required|string|max:255',
            'religion'             => 'nullable|string|max:100',

            'earlypregnancy'       => 'nullable|boolean',
            'mstatus'              => 'required|string|max:100',

            'birthdate'            => 'required|date|before:today',

            'isvoters'             => 'required|boolean',
            'ispwd'                => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'The first name is required.',
            'birthdate.before'   => 'Birthdate cannot be in the future.',
            'gender.in'          => 'Please select a valid gender option.',
        ];
    }
}
