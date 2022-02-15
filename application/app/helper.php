<?php
/* Define common app */

use Carbon\Carbon;

/**
 * Get time created at default
 *
 * @return string
 */
function get_created_at(): string
{
    return Carbon::now()->toAtomString();
}

/**
 * Format amount value
 *
 * @param $value
 * @return mixed|string
 */
function format_amount($value)
{
    if (is_numeric($value)) {
        return number_format($value) . ' ' . CURRENCY_VND;
    }
    return $value;
}
