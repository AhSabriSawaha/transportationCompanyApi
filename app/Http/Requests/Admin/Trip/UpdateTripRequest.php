<?php

namespace App\Http\Requests\Admin\Trip;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTripRequest extends FormRequest
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
            'price' => ['integer', 'required'],
            'duration' => ['integer', 'required'],
            'description' => ['string', 'required'],
            'price_description' => ['required', 'string'],
            'start_time' => ['required', 'date'],
            'location_id' => ['required', Rule::exists('locations', 'id')],
            'vehicle_id' => ['required', Rule::exists('vehicles', 'id')]
        ];
    }
}
