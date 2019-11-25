<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
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
            'service_type' => 'required',
            'departure' => 'required',
            'destination' => 'required',
            'vehicle_type' => 'required',
            'vehicle_make' => 'required',
            'pickup_date' => 'required',
            'end_date' => 'required',
        ];
    }
}
