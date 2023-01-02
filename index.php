<?php

require('vendor/autoload.php');

use Src\Http\Request;
use Src\Notifications\Telegram;
use Src\Services\Converter;
use Symfony\Component\Dotenv\Dotenv;
use Src\Factory\ExchangesFileFactory;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/config/.env');

//echo ExchangesFileFactory::create('curl'); /// symfony or curl

// todo curl class

$request = new Request($_GET, $_POST);
//
$get = $request->getQueryParams();

if (array_key_exists('pay', $get)) {
    if (is_numeric($get['pay'])) {
        $money =  Converter::ConvertCurrency($get['pay']);
        $data = "New payment " . $money . " USD";
        echo $money;
        echo Telegram::send($data);
    } else {
        echo "that not number get";
    }
} else {
    echo "Query params doesn't have  specified a pay parameter";
}
