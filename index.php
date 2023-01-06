<?php

require('vendor/autoload.php');

use Src\Factory\RequestFactory;
use Src\Http\Request\Request;
use Src\Http\Request\RunRequests;

//$test = new GetRequestHandler();
//var_dump($test());


try {
//    $request = new GetRequestHandler(RequestFactory::create($_GET, $_POST));
    $request = new Runrequests(RequestFactory::create($_GET, $_POST));
    var_dump($request);
} catch (Exception $e) {
    echo "Ошибка _GET " . $e->getMessage();
}


//$test = new ConvertClass('23', 'currency.txt');
//
//var_dump($test->getNumber());
//
//echo $test->getNumber() . PHP_EOL;
//$dotenv = new Dotenv();
//$dotenv->load(__DIR__.'/config/.env');
//
//try {
//    var_dump($request = new RunRequests(RequestFactory::create($_GET, $_POST)));
//} catch (Exception $e) {
//}


//try {
//    var_dump($request->getQueryParams('pay'));
//} catch (Exception $e) {
//    echo "Ошибка _GET " . $e->getMessage();
//}
//
//if (array_key_exists('pay', (array)$request)) {
//    if (is_numeric($request['pay'])) {
//        $money =  Converter::ConvertCurrency($request['pay']);
//        $data = "New payment " . $money . " USD";
//        $status_code = Telegram::send($data);
//        $send_status_code =  $status_code  . " Message: ". $data;
//        CreateQueryValidation::log($send_status_code);
//        echo "$send_status_code";
//    } else {
//        echo "that not number get";
//    }
//} else {
//    echo "Query params doesn't have  specified a <b>pay</b> parameter";
//}
