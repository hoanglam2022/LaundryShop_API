<?php

namespace App\Rules\Product;

use App\Rules\BaseRule;

class ProductDescriptionRule extends BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return empty($value) || is_string($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Mô tả phẩm không hợp lệ.';
    }
}
