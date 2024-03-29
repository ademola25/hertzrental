<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'username' => 'required',
            'phone' => 'required',
            'pickup_address' => 'required',
            'pick_up_date' => 'required',
            'dropoff_address' => 'required',
            'end_date' => 'required',  
        ];
    }
}
