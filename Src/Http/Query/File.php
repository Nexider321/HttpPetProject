<?php

declare(strict_types=1);

namespace Src\Http\Query;

use Exception;
use Src\Http\Query\Validation\ValidationInterface;

final class File
{
//    private ValidationInterface $validation;
//    private string $key;

    /**
     * @throws Exception
     */
    public function __construct(
        ValidationInterface $validation,
        string $key
    ) {
//        $this->validation = $validation;
//        $this->key = $key;
        $this->send($validation, $key);
    }


    /**
     * @throws Exception
     */
    public function send(ValidationInterface $validation, string $key): void
    {
        $validation->isValid($key);
//            \Src\Services\File::log(ExchangesFileFactory::create($this->key, 'GBP,JPY,RUB,USD'));
        \Src\Services\File::log('Create CreateQueryValidation CREATED');
    }
}
