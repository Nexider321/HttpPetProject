<?php

use http\Request;
use App\Converter;
use http\SendTelegram;
require('vendor/autoload.php');

//$convert->GetCurrency();

$request = new Request();
$convert = new Converter();
$telegram = new SendTelegram();
$get = $request->getQueryParams();


print_r($convert->ConvertCurrency($get));



$value = $convert->ConvertCurrency($get);
    $data = "New payment ". $value . " USD!!!";
    $telegram->send($data);

