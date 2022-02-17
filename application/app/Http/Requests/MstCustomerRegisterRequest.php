<?php

namespace App\Http\Requests;

use App\Models\laundry_shop\MstCustomer;
use App\Rules\EmailRule;
use App\Rules\EmailUniqueRule;
use App\Rules\FirstNameRule;
use App\Rules\LastNameRule;
use App\Rules\PasswordRule;
use App\Rules\PhoneNumberRule;
use App\Rules\PhoneNumberUniqueRule;
use App\Rules\UsernameRule;
use App\Rules\UsernameUniqueRule;

class MstCustomerRegisterRequest extends ApiRequest
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
            'username'     => [
                new UsernameRule(),
                new UsernameUniqueRule(new MstCustomer())],
            'password'     => new PasswordRule(),
            'first_name'   => new FirstNameRule(),
            'last_name'    => new LastNameRule(),
            'email'        => [new EmailRule(), new EmailUniqueRule(new MstCustomer())],
            'phone_number' => [new PhoneNumberRule(), new PhoneNumberUniqueRule(new MstCustomer())],
        ];
    }
}
