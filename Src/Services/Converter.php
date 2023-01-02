<?php

namespace Src\Services;

use phpDocumentor\Reflection\Types\Mixed_;

class Converter
{
    public static function ConvertCurrency(int $sum): float
    {
        $currenciesFile = (object)  json_decode(file_get_contents('currency.txt'));
        //@property @mixin
        /**
         * @psalm-suppress MixedPropertyFetch
         */
        if (isset($currenciesFile->rates->USD)) {
            //@property @mixin
            /**
             * @psalm-suppress MixedPropertyFetch
             */
            return round($sum * (float) $currenciesFile->rates->USD);
        }

        return $sum * 1.2;
    }
}
