<?php

namespace Src\Http;

use Src\Services\Converter;

class Request
{
    public static function getQueryParams()
    {
        if (is_numeric($_GET['pay']) && ! empty($_GET['pay'])) {
            return $value = Converter::ConvertCurrency($_GET['pay']);
        } else {
            echo "No INT: pay";
        }
    }
}
