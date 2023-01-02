<?php

namespace Src\Services;

use Src\Http\SymfonyHttp;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Converter
{
    public static function ConvertCurrency(int $sum): float
    {
        $currenciesFile = (object)  json_decode(file_get_contents('currency.txt'));
        if (isset($currenciesFile->rates->USD)) {
            return round($sum * (float) $currenciesFile->rates->USD);
        }
        return $sum * 1.2;
    }
}
