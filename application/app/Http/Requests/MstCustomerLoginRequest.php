<?php

namespace App\Http\Requests;

use App\Models\laundry_shop\MstCustomer;
use App\Rules\PasswordRule;
use App\Rules\UserNameFindRule;
use App\Rules\UsernameRule;

class MstCustomerLoginRequest extends ApiRequest
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
            'username' => [
                new UsernameRule(),
                new UserNameFindRule(new MstCustomer())
            ],
            'password' => new PasswordRule(),
        ];
    }
}
