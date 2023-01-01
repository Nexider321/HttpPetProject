<?php

require('vendor/autoload.php');

use Src\Http\Request;
use Src\Notifications\SendTelegram;
use Src\Services\Converter;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/config/.env');

$telegram = new SendTelegram();

//$get = Request::getQueryParams();

$converter = new Converter();
$re = $converter->GetCurrency();
echo "\ngood";
//if (is_numeric($get)) {
//    $data = "New payment " . $get . " USD!!!";
//    echo $get;
//    try {
//        $telegram->send($data);
//    } catch (Exception $exception) {
//        throw new Exception();
//    }
//}
