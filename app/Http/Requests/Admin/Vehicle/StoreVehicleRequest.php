<?php

namespace App\Http\Requests\Admin\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'rows_num' => ['required', 'integer'],
            'left_seat' => ['required', 'integer'],
            'right_seat' => ['required', 'integer'],
            'last_row' => ['required', 'integer'],
            'color' => ['required', 'string']
        ];
    }
}
