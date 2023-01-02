<?php

namespace Src\Http;

use Symfony\Component\HttpClient\HttpClient;

class SymfonyHttpFile
{
    public static function create(): string
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.apilayer.com/exchangerates_data/latest', [
            'query' => [
                'symbols' => 'GBP,JPY,RUB,USD',
                'base' => 'EUR',
            ],
            'headers' => [
                "Content-Type: text/plain",
                "apikey: " . $_ENV['API_KEY']
            ]


        ]);

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $contentArray = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
        switch ($statusCode) {
            case 200:  # OK
                $file = fopen('currency.txt', "w");
                fwrite($file, $content);
                break;
            default:
                echo 'Unexpected HTTP code: ', $statusCode, "\n";
        }
        return $statusCode;
    }


//
//    private $client;
//
//    public function __construct(HttpClientInterface $client)
//    {
//        $this->client = $client;
//    }
//
//    public static function fetchApiInformation(): array
//    {
//        $response = $this->client->request(
//            'GET',
//            'https://api.github.com/repos/symfony/symfony-docs'
//        );
//
//        $statusCode = $response->getStatusCode();
//        // $statusCode = 200
//        $contentType = $response->getHeaders()['content-type'][0];
//        // $contentType = 'application/json'
//        $content = $response->getContent();
//        // $content = '{"id":521583, "name":"symfony-docs", ...}'
//        $content = $response->toArray();
//        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
//
//        return $content;
//    }
}
