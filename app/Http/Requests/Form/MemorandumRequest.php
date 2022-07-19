<?php

namespace App\Http\Requests\Form;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MemorandumRequest extends FormRequest
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
            'id_no'                 => 'required',
            'name_of_employee'      => 'required',
            'department'            => 'required',
            'section'               => 'required',
            'asset_code'            => 'required',
            'asset_type'            => 'required',
            'asset_description'     => 'required',
            'asset_serial_no'       => 'required',
            'asset_value'           => 'required'
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
