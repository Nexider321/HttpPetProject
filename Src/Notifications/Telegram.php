<?php

namespace Src\Notifications;

use Src\Http\Request\CurlRequest;

class Telegram
{
    public static function send(string $data): string
    {
        $token = $_ENV['TELEGRAM_KEY'];
        $data = array(
            'chat_id' => 618759134,
            'text' => "$data",
            'parse_mode' => 'html',
            'disable_web_page_preview' => true,
        );
        if ($token != '') {
            $curl = new CurlRequest();
            $curl->setUrl('https://api.telegram.org/bot' . $token . '/sendMessage')
                ->setMethod('post')
                ->setData($data)
                ->send();
            $status_code = $curl->info;
            if ($status_code == 200) {
                return "TELEGRAM Message send Http code $status_code";
            } else {
                return "TELEGRAM Message not sent Http code $status_code";
            }
        }
        return "Error";
    }
}
