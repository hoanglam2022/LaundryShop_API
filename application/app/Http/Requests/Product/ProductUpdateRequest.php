<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\ApiRequest;
use App\Rules\Product\ProductDescriptionRule;
use App\Rules\Product\ProductNameRule;
use App\Rules\Product\ProductPriceRule;
use App\Rules\Product\ProductUnitRule;

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
            'name'        => ['required', new ProductNameRule()],
            'price'       => ['required', new ProductPriceRule()],
            'unit'        => ['required', new ProductUnitRule()],
            'description' => new ProductDescriptionRule(),
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
            'name.required'  => __('validation.required', ['attribute' => __('product.name')]),
            'price.required' => __('validation.required', ['attribute' => __('product.price')]),
            'unit.required'  => __('validation.required', ['attribute' => __('product.unit')]),
        ];
    }
}
