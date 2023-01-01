<?php

require('vendor/autoload.php');

use Src\Http\Request;
use Src\Notifications\SendTelegram;
use Src\Services\Converter;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/config/.env');

$telegram = new SendTelegram();

$request = new Request($_GET, $_POST);



$get = $request->getQueryParams();
if (array_key_exists('pay', $get)) {
    $money =  Converter::ConvertCurrency($get['pay']);
    $data = "New payment " . $money . " USD!!!";
    echo $money;
    try {
        $telegram->send($data);
    } catch (Exception $exception) {
        throw new Exception();
    }
} else {
    echo "in query params doesnt have pay param";
}
