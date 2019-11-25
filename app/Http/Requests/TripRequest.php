<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email_address' => 'required',
            'passenger_names' => 'required',
            'passenger_phone_numbers' => 'required|min:15|numeric',
            'departure' => 'required:max:30',
            'destination' => 'required',
            'pick_up_date' => 'required',
            'end_date' => 'required',
            'service_type' => 'required',
            'vehicle_type' => 'required',
            'vehicle_make' => 'required',
            'pickup_street' => 'required',
            'actual_street' => 'required'
        ];
    }
}
