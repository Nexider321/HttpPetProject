<?php

namespace Src\Services;

use Src\Http\SymfonyHttp;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Converter
{
    public static function ConvertCurrency(int $sum)
    {
        $currenciesFile = json_decode(file_get_contents('currency.txt'));

        return round($sum * $currenciesFile->rates->USD);
    }

    public function GetCurrency()
    {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/latest?symbols=GBP%2CJPY%2CRUB%2CUSD&base=EUR",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: text/plain",
                    "apikey: " . $_ENV['API_KEY']
                ),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
            ));

            $response = curl_exec($curl);
            if (!curl_errno($curl)) {
                switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                    case 200:  # OK
                        $file = fopen('currency.txt', "w");
                        fwrite($file, $response);
                        break;
                    default:
                        echo 'Unexpected HTTP code: ', $http_code, "\n";
                }
            }
            curl_close($curl);

    }
}
