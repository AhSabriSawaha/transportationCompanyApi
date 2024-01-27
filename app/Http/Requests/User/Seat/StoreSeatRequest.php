<?php

namespace App\Http\Requests\User\Seat;

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
            'first_name' => ['string', 'required'],
            'last_name' => ['string', 'required'],
            'email' => ['email', 'required'],
            'phone_number' => ['string', 'required'],
            'nid' => ['string', 'required'],
            'father_name' => ['string', 'required'],
            'mother_name' => ['string', 'required'],
            'birth_date' => ['date', 'required'],
            'birth_location' => ['string', 'required'],
            'reservation_id' => [Rule::exists('reservations', 'id'), 'required'],
            'vehicle_id' => [Rule::exists('vehicles', 'id'), 'required'],
            'files' => ['array', 'required'],
            // 'is_company' => ['boolean']
        ];
    }
}
