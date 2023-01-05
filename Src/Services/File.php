<?php

namespace Src\Services;

use mysql_xdevapi\Exception;
use Src\Http\RunRequests;

class File implements ValidationInterface
{
    public static function log(string $error): string
    {
        try {
            $error =  date("Y-m-d H:i:s") . " " . $error . PHP_EOL;
            file_put_contents('log.txt', $error, FILE_APPEND);
        } catch (\Exception $e) {
            return 'Запись не удалась';
        }
        return 'OK';
    }

    public static function write(string $content): string
    {
        try {
            $file = fopen('currency.txt', "w");
            fwrite($file, $content);
            fclose($file);
        } catch (\Exception $e) {
            return 'Запись не удалась';
        }
        return 'OK';
    }

    public function isValid(RunRequests $key): bool
    {
        // TODO: Implement isValid() method.
    }

    public function isNumeric(RunRequests $key): bool
    {
        // TODO: Implement isNumeric() method.
    }

    public function isEmpty(RunRequests $key): bool
    {
        // TODO: Implement isEmpty() method.
    }

    public function isKeySuccess(RunRequests $key): bool
    {
        // TODO: Implement isKeySuccess() method.
    }
}
