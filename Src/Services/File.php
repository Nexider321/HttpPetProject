<?php

namespace Src\Services;

class File
{
    public static function log(string $error): void
    {
        $error =  date("Y-m-d H:i:s") . " " . $error . PHP_EOL;
        file_put_contents('log.txt', $error, FILE_APPEND);
    }
}
