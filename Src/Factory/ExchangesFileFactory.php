<?php

namespace Src\Factory;

use Src\Http\CurlFile;
use Src\Http\SymfonyHttpFile;

class ExchangesFileFactory
{
    public static function create($type)
    {
        switch ($type) {
            case 'curl':
                $http_code = CurlFile::create();
                break;

            case 'symfony':
                $http_code = new SymfonyHttpFile();

                break;

            default:
                die('Incorrect type ' . $type);
        }
        return $http_code;
    }
}
