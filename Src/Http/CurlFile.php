<?php

namespace Src\Http;

class CurlFile
{
    public static function create(): string
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
        $http_code = (string) curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (!curl_errno($curl)) {
            switch ($http_code) {
                case 200:  # OK
                    $file = fopen('currency.txt', "w");
                    fwrite($file, (string) $response);
                    break;
                default:
                    echo 'Unexpected HTTP code: ', $http_code, "\n";
            }
        }
        curl_close($curl);
        return $http_code;
    }
}
