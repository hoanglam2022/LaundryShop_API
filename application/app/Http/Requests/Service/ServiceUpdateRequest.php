<?php

namespace App\Http\Requests\Service;

use App\Http\Requests\ApiRequest;

class ServiceUpdateRequest extends ApiRequest
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
            'name'        => ['required', 'max:255', 'string'],
            'unit'        => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'string', 'min:0', 'max:65000'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
