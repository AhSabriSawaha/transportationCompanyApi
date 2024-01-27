<?php

namespace App\Http\Requests\Admin\Seat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSeatRequest extends FormRequest
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
            'first_name' => ['string', 'nullable'],
            'last_name' => ['string', 'nullable'],
            'email' => ['email', 'nullable'],
            'phone_number' => ['string', 'nullable'],
            'nid' => ['string', 'nullable'],
            'father_name' => ['string', 'nullable'],
            'mother_name' => ['string', 'nullable'],
            'birth_date' => ['date', 'nullable'],
            'birth_location' => ['string', 'nullable'],
            'reservation_id' => [ Rule::exists('reservations', 'id'), 'nullable'],
            'vehicle_id' => [Rule::exists('vehicles', 'id'), 'nullable'],
            'files' => ['array', 'nullable'],
            'is_company' => ['required', 'boolean']
        ];
    }
}
