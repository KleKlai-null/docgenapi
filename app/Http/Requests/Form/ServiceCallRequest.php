<?php

namespace App\Http\Requests\Form;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServiceCallRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_name'             => 'required',
            'contact_number'            => 'required',
            'phone_no'                  => 'required',
            'status'                    => 'required',
            'item_no'                   => 'required',
            'description'               => 'required',
            'mfr_serial_no'             => 'required',
            'serial_no'                 => 'required',
            'subject'                   => 'required',
            'origin'                    => 'required',
            'problem_type'              => 'required',
            'assigned_to'               => 'required',
            'priority'                  => 'required',
            'call_type'                 => 'required',
            'technician'                => 'required',
            'remarks'                   => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json([
            'success'       => false,
            'errorInfo'     => $errors->messages(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
