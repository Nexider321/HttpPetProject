<?php

namespace Src\Factory;

use SebastianBergmann\Diff\Exception;
use Src\Http\CurlFile;
use Src\Http\CurlRequest;
use Src\Http\SymfonyHttpFile;
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
                        fclose($file);
                        self::LogFile($status_code);

                        return "Http code $status_code";
                    } else {
                        $error = date("Y-m-d H:i:s")." Отправка не сработала Http code $status_code".PHP_EOL;
                        self::LogFile($error);
                        return $error;

                    }


                break;

            case 'symfony':
                $http_file = new SymfonyHttpFile();
                return $http_file->create();
            default:
                die('Incorrect type ' . $type);
        }

    }

    public static function LogFile($error)
    {
        file_put_contents('log.txt', $error, FILE_APPEND);
    }
}
