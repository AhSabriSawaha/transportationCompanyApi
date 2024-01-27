<?php

namespace App\Http\Requests\User\Seat;

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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'string'],
            'nid' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'birth_location' => ['required', 'string'],
            'reservation_id' => ['required', Rule::exists('reservations', 'id')],
            'vehicle_id' => ['required', Rule::exists('vehicles', 'id')],
            // 'is_company' => ['boolean']
        ];
    }
}
