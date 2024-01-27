<?php

namespace App\Http\Requests\Admin\Seat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSeatRequest extends FormRequest
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
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'phone_number' => ['nullable', 'string'],
            'nid' => ['nullable', 'string'],
            'father_name' => ['nullable', 'string'],
            'mother_name' => ['nullable', 'string'],
            'birth_date' => ['nullable', 'date'],
            'birth_location' => ['nullable', 'string'],
            'reservation_id' => ['nullable', Rule::exists('reservations', 'id')],
            'vehicle_id' => ['nullable', Rule::exists('vehicles', 'id')],
            'is_company' => ['required', 'boolean']
        ];
    }
}
