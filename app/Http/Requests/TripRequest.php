<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required",
            "driver_id"=>"required",
            "type"=>"required",
            "places"=>"required",
            "semester_id"=>"required",
            "Year"=>"required",
            "ts_id"=>"required",
            "day_id"=>"required",
        ];
    }
}
