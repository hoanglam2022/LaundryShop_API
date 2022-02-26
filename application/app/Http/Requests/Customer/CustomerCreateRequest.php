<?php

namespace App\Http\Requests\Customer;

use App\Http\Requests\ApiRequest;
use App\Models\laundry_shop\MstCustomer;
use App\Rules\EmailUniqueRule;
use App\Rules\PhoneNumberUniqueRule;
use App\Rules\UsernameUniqueRule;

class CustomerCreateRequest extends ApiRequest
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
            'username'         => ['required', 'max:255', 'string', new UsernameUniqueRule(new MstCustomer())],
            'password'         => ['required', 'max:255', 'string'],
            'password_confirm' => ['required', 'max:255', 'string', 'same:password'],
            'first_name'       => ['required', 'max:255', 'string'],
            'last_name'        => ['required', 'max:255', 'string'],
            'email'            => ['required', 'max:255', 'email', new EmailUniqueRule(new MstCustomer())],
            'phone_number'     => ['required', 'max:50', new PhoneNumberUniqueRule(new MstCustomer())],
            'address'          => ['string'],
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
            'username.required'         => __('validation.required', ['attribute' => __('common.username')]),
            'username.max'              => __('validation.max.string', ['attribute' => __('common.username')]),
            'username.string'           => __('validation.string', ['attribute' => __('common.username')]),
            'password.required'         => __('validation.required', ['attribute' => __('common.password')]),
            'password.max'              => __('validation.max.string', ['attribute' => __('common.password')]),
            'password.string'           => __('validation.string', ['attribute' => __('common.password')]),
            'password_confirm.required' => __('validation.required', ['attribute' => __('common.password_confirm')]),
            'password_confirm.max'      => __('validation.max.string', ['attribute' => __('common.password_confirm')]),
            'password_confirm.string'   => __('validation.string', ['attribute' => __('common.password_confirm')]),
            'password_confirm.same'     => __('validation.same', [
                'attribute' => __('common.password'),
                'other'     => __('common.password_confirm')
            ]),
            'first_name.required'       => __('validation.required', ['attribute' => __('common.first_name')]),
            'first_name.max'            => __('validation.max.string', ['attribute' => __('common.first_name')]),
            'first_name.string'         => __('validation.string', ['attribute' => __('common.first_name')]),
            'last_name.required'        => __('validation.required', ['attribute' => __('common.last_name')]),
            'last_name.max'             => __('validation.max.string', ['attribute' => __('common.last_name')]),
            'last_name.string'          => __('validation.string', ['attribute' => __('common.last_name')]),
            'phone_number.required'     => __('validation.required', ['attribute' => __('common.phone_number')]),
            'phone_number.max'          => __('validation.max.string', ['attribute' => __('common.phone_number')]),
            'address.string'            => __('validation.string', ['attribute' => __('common.address')]),
        ];
    }
}
