<?php

declare(strict_types=1);

namespace Src\Http\Query\Validation;

use Exception;

final class CreateQueryValidation implements ValidationInterface
{
    /**
     * @throws Exception
     */
    public function isValid(string $key): bool
    {
        $this->isNumeric($key);
        $this->isEmpty($key);
        $this->isKeySuccess($key);
        return true;
    }
    /**
     * @throws Exception
     */
    public function isNumeric(string $key): void
    {
        if (is_numeric($key)) {
            throw new Exception("Запрос $key не должен содержать цифры");
        }
    }


    /**
     * @throws Exception
     */
    public function isEmpty(string $key): void
    {
        if (empty($key)) {
            throw new Exception("Запрос $key не должен быть пустым!");
        }
    }

    /**
     * @throws Exception
     */
    public function isKeySuccess(string $key): void
    {
        if ($key != 'curl' && $key != 'symfony') {
            throw new Exception('Запрос create  должен содержать curl или symfony!');
        }
    }
}
