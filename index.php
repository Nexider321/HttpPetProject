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

echo Converter::ConvertCurrency(252);
//
//$get = $request->getQueryParams();
//if (array_key_exists('pay', $get)) {
//    echo  Converter::ConvertCurrency($get['pay']);
//
//} else {
//    echo "in query params doesnt have pay param";
//}
//$converter = new Converter();
//$re = $converter->GetCurrency();
//echo "\ngood";
//if (is_numeric($get)) {
//    $data = "New payment " . $get . " USD!!!";
//    echo $get;
//    try {
//        $telegram->send($data);
//    } catch (Exception $exception) {
//        throw new Exception();
//    }
//}
