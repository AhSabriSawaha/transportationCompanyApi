<?php

namespace App\Http\Requests\Admin\Trip;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTripRequest extends FormRequest
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
            'price' => ['required', 'integer'],
            'duration' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'price_description' => ['required', 'string'],
            'start_time' => ['date', 'required'],
            'location_id' => ['required', Rule::exists('locations', 'id')],
            'vehicle_id' => ['required', Rule::exists('vehicles', 'id')]
        ];
    }
}
