<?php

namespace App\Http\Requests;

class ProductUpdateRequest extends ApiRequest
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
            'itemName'          => 'max:255|string',
            'itemPrice'         => 'numeric|digits_between:1,7',
            'isIncludedTax'     => 'boolean',
            'isIncludedPostage' => 'boolean',
            'isDepot'           => 'boolean',
            'asurakuDeliveryId' => 'boolean',
            'image'             => 'image'
        ];
    }
}
