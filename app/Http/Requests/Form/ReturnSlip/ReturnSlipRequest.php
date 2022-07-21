<?php

namespace App\Http\Requests\Form\ReturnSlip;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReturnSlipRequest extends FormRequest
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
            'withdrawal_form'       => 'required',
            'department'            => 'required',
            'mr_no'                 => 'required',
            'withdrawal_slip_no'    => 'required',
            'prepared_by'           => 'required',
            'approved_by'           => 'required',
            'received_by'           => 'required',
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
