<?php

require('vendor/autoload.php');

use Src\Http\Request;
use Src\Notifications\Telegram;
use Src\Services\Converter;
use Src\Services\File;
use Symfony\Component\Dotenv\Dotenv;
use Src\Factory\ExchangesFileFactory;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/config/.env');

$request = new Request($_GET, $_POST);

$get = $request->getQueryParams();

if (array_key_exists('create', $get)) {
    try {
        File::log(ExchangesFileFactory::create($get['create'], 'GBP,JPY,RUB,USD'));
        echo "created ";
    } catch (\Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface|\Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface|\Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface|\Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface $e) {
        echo 'Поймано исключение: ', $e->getMessage(), "\n";
    }
}

if (array_key_exists('pay', $get)) {
    if (is_numeric($get['pay'])) {
        $money =  Converter::ConvertCurrency($get['pay']);
        $data = "New payment " . $money . " USD";
        echo " Money:" . $money;
        File::log(Telegram::send($data) . " Message: ". $data);
    } else {
        echo "that not number get";
    }
} else {
    echo "Query params doesn't have  specified a <b>pay</b> parameter";
}
