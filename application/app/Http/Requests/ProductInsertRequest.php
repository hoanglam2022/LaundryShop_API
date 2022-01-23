<?php

namespace App\Http\Requests;

class ProductInsertRequest extends ApiRequest
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
            'itemUrl'           => 'required|numeric|digits_between:1,10|unique:App\Models\MstProduct,itemUrl',
            'itemName'          => 'required|string|max:255',
            'itemPrice'         => 'required|numeric|digits_between:1,7',
            'isIncludedTax'     => 'required|boolean',
            'isIncludedPostage' => 'required|boolean',
            'isDepot'           => 'required|boolean',
            'asurakuDeliveryId' => 'required|boolean',
            'image'             => 'image'
        ];
    }
}
