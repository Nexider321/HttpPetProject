<?php

namespace Src\Http;

use Src\Services\File;
use Symfony\Component\HttpClient\HttpClient;


class SymfonyHttpFile
{
    private  $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }


    public function create(string $symb): int
    {
        $response = $this->client->request('GET', 'https://api.apilayer.com/exchangerates_data/latest', [
            'query' => [
                'symbols' => $symb,
                'base' => 'EUR',
            ],
            'headers' => [
                "Content-Type: text/plain",
                "apikey: " . $_ENV['API_KEY']
            ]
        ]);

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
//        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
//        $contentArray = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
        switch ($statusCode) {
            case 200:  # OK
                File::write($content);
                break;
            default:
        }
        return $statusCode;
    }
}
