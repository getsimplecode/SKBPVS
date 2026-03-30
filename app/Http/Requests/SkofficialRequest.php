<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkofficialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kabataan_id'    => ['required', 'integer', 'exists:kabataans,id'],
            'position'       => ['required', 'in:chairman,treasurer,secretary,kagawad'],
            'selection_type' => ['required', 'in:elected,appointed'],
            'term_start'     => ['required', 'date'],
            'status'         => ['required', 'in:active,resigned,terminated,inactive,completed_term'],
        ];
    }

    public function messages(): array
    {
        return [
            'kabataan_id.required'    => 'Please select a Kabataan member.',
            'kabataan_id.exists'      => 'The selected Kabataan member does not exist.',
            'position.required'       => 'Please select a position.',
            'position.in'             => 'Position must be Chairman, Treasurer, Secretary, or Kagawad.',
            'selection_type.required' => 'Please specify the selection type.',
            'selection_type.in'       => 'Selection type must be either Elected or Appointed.',
            'term_start.required'     => 'Term start date is required.',
            'term_start.date'         => 'Term start must be a valid date.',
            'status.required'         => 'Please select a status.',
            'status.in'               => 'Status must be Active, Resigned, Terminated, Inactive, or Completed Term.',
        ];
    }
}
