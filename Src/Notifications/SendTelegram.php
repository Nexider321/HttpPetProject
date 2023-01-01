<?php

namespace Src\Notifications;

class SendTelegram
{
    public function send(string $data): void
    {
        $token = $_ENV['TELEGRAM_KEY'];
        $data = array(
            'chat_id' => 618759134,
            'text' => "$data",
            'parse_mode' => 'html',
            'disable_web_page_preview' => true,
        );
        if ($token != '') {
            $ch = curl_init('https://api.telegram.org/bot'.$token.'/sendMessage');
            curl_setopt_array($ch, array(
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $data
            ));
            curl_exec($ch);
            if (!curl_errno($ch)){
                switch ($http_code = (string) curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
                    case 200:
                        curl_close($ch);
                        break;
                    default:
                        echo "error $http_code";
                }
            }
            curl_close($ch);
        }
    }
}
