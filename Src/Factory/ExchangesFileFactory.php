<?php

namespace Src\Factory;

use SebastianBergmann\Diff\Exception;
use Src\Http\CurlFile;
use Src\Http\CurlRequest;
use Src\Http\SymfonyHttpFile;
use Src\Services\File;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ExchangesFileFactory
{
    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public static function create($type, $symb)
    {
        switch ($type) {
            case 'curl':

                $curl = new CurlRequest();
                $curl->setUrl('https://api.apilayer.com/exchangerates_data/latest?symbols=' .$symb.'&base=EUR')
                    ->setHeaders([
                        "Content-Type: text/plain",
                        "apikey: " . $_ENV['API_KEY'],
                    ])
                    ->send();
                $status_code = $curl->info;
                if ($status_code == 200) {
                    File::write($curl->content);
                    return " Curl HTTP code $status_code";
                } else {
                    return "Curl HTTP code $status_code";
                }
                // no break
            case 'symfony':
                $http_file = new SymfonyHttpFile();
                $status_code = $http_file->create($symb);
                return"symfony HTTP Code $status_code ";
            default:
                die('Incorrect type ' . $type . ' choose curl or symfony');
        }
    }
}
