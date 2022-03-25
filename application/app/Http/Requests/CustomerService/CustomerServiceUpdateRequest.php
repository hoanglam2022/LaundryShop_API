<?php

namespace App\Http\Requests\CustomerService;

use App\Http\Requests\ApiRequest;

class CustomerServiceUpdateRequest extends ApiRequest
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => ['required', 'numeric', 'min:1', 'max:999999999', 'exists:mst_customer,customer_id'],
            'service_id'  => ['required', 'numeric', 'min:1', 'max:999999999', 'exists:mst_service,service_id'],
            'price'       => ['required', 'numeric', 'min:0', 'max:999999999'],
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
