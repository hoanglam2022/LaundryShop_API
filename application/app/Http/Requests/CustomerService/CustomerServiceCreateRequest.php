<?php

namespace App\Http\Requests\CustomerService;

use App\Http\Requests\ApiRequest;
use App\Models\laundry_shop\MstCustomer;
use App\Rules\EmailUniqueRule;
use App\Rules\PhoneNumberUniqueRule;
use App\Rules\UsernameUniqueRule;

class CustomerServiceCreateRequest extends ApiRequest
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
            'customer_id' => ['required', 'numeric', 'min:1', 'max:999999999', 'exists:mst_customer,id'],
            'service_id'  => ['required', 'numeric', 'min:1', 'max:999999999', 'exists:mst_service,id'],
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
