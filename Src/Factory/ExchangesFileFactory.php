<?php

namespace Src\Factory;

use Src\Http\CurlFile;
use Src\Http\CurlRequest;
use Src\Http\SymfonyHttpFile;

class ExchangesFileFactory
{
    public static function create($type)
    {
        switch ($type) {
            case 'curl':
                $curl = new CurlRequest();
                $curl->setUrl('https://api.apilayer.com/exchangerates_data/latest?symbols=GBP%2CJPY%2CRUB%2CUSD&base=EUR')
                    ->setHeaders([
                        "Content-Type: text/plain",
                        "apikey: " . $_ENV['API_KEY'],
                    ])
                    ->send();
                $status_code = $curl->info;
                if ($status_code == 200) {
                    $file = fopen('currency.txt', "w");
                    fwrite($file, (string) $curl->content);
                    return "Http code $status_code";
                } else {
                    return "Http code $status_code";
                }
                break;

            case 'symfony':
                $http_code = new SymfonyHttpFile();

                break;

            default:
                die('Incorrect type ' . $type);
        }
        return $http_code;
    }
}
