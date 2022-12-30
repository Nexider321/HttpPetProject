<?php

namespace App;

class Converter {

    public function ConvertCurrency(int $sum)
    {
        $currenciesFile = json_decode(file_get_contents('currency.txt'));

         return $sum * $currenciesFile->rates->USD;
    }

    public function GetCurrency()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/latest?symbols=GBP%2CJPY%2CRUB%2CUSD&base=EUR",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: qObDem0HQzaMFjjvfYbqh9lTAADcBq1J"
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

        curl_close($curl);
        $myfile = fopen('currency.txt', "w");
        fwrite($myfile, $response);
    }
}