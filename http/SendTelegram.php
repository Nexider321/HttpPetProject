<?php

namespace http;

class SendTelegram
{

    public function send($data)
    {
        $token = 'YOUR TOKEN';
        $data = array(
            'chat_id' => 618759134,
            'text' => "$data",
            'parse_mode' => 'html',
            'disable_web_page_preview' => true,
        );
        if($token != '') {
            $ch = curl_init('https://api.telegram.org/bot'.$token.'/sendMessage');
            curl_setopt_array($ch, array(
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $data
            ));
            curl_exec($ch);
            curl_close($ch);
        }
    }


}