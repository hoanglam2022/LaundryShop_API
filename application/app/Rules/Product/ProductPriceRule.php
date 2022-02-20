<?php

namespace App\Rules\Product;

use App\Rules\BaseRule;

class ProductPriceRule extends BaseRule
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
        if (!is_numeric($value)) {
            return false;
        }

        if ($value < 0 && $value > 9999999999) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Giá sản phẩm không hợp lệ.';
    }
}
