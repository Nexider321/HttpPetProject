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
        $status_code = ExchangesFileFactory::create($get['create'], 'GBP,JPY,RUB,USD');
        File::log($status_code);
        echo "$status_code";
    } catch (\Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface|\Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface|\Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface|\Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface $e) {
        echo 'Поймано исключение: ', $e->getMessage(), "\n";
    }
}

if (array_key_exists('pay', $get)) {
    if (is_numeric($get['pay'])) {
        $money =  Converter::ConvertCurrency($get['pay']);
        $data = "New payment " . $money . " USD";
        $status_code = Telegram::send($data);
        $send_status_code =  $status_code  . " Message: ". $data;
        File::log($send_status_code);
        echo "$send_status_code";
    } else {
        echo "that not number get";
    }
} else {
    echo "Query params doesn't have  specified a <b>pay</b> parameter";
}
