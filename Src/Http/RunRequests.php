<?php

namespace Src\Http;

use Exception;
use Src\Services\File;

class RunRequests
{
    public array $get;
    /**
     * @throws Exception
     */
    public function __construct(Request $request)
    {
       $this->get = $request->getQueryParams();
        if (isset($this->get['create'])) {
             $this->createFile();
        }
//        if (isset($this->get['pay'])) {
//            $this->
//        }
    }

    /**
     * @throws Exception
     */
    public function createFile(): void
    {
        if($this->isValid($this->get['create'])) {
//            File::log(ExchangesFileFactory::create($this->get['create'], 'GBP,JPY,RUB,USD'));
            File::log('OK');
        } else {
            throw new Exception('NOT VALID');
        }
    }
//
//    public function createRequest(): void
//    {
//        $this->isNumeric()
//
//    }
    /**
     * @throws Exception
     */
    private function isValid($create): bool
    {
        match (false) {
            $this->isEmpty($create), $this->isNumeric($create), $this->isKeySuccess($create) => false,
            default => true,
        };
        return true;
    }

    /**
     * @throws Exception
     */
    private function isNumeric($key): bool
    {
        if(is_numeric($key)){
            throw new Exception("Запрос $key не должен содержать цифры!");
        }
        return $key;
    }

    /**
     * @throws Exception
     */
    private  function isEmpty($key): bool
    {
        if (empty($key)) {
            throw new Exception("Запрос $key не должен быть пустым!");
        }
        return $key;
    }

    /**
     * @throws Exception
     */
    private function isKeySuccess($key): bool
    {
        if ($key !== 'curl' && $key !== 'symfony'){
            throw new Exception('Запрос create  должен содержать curl или symfony!');
        }
        return $key;
    }
}