<?php

declare(strict_types=1);

namespace Src\Http\Query\Validation;

use Exception;

final class TelegramQueryValidation implements ValidationInterface
{
    /**
     * @throws Exception
     */
    public function isValid(string $key): bool
    {
        $this->isNumeric($key);
        $this->isEmpty($key);
        return true;
    }

    /**
     * @throws Exception
     */
    public function isNumeric(string $key): void
    {
        if (!is_numeric($key)) {
            throw new Exception("Запрос $key Должен содержать только цифры");
        }
    }

    /**
     * @throws Exception
     */
    public function isEmpty(string $key): bool
    {
//        if (empty($key)) {
//            throw new Exception("Запрос $key не должен быть пустым!");
//        }
        return empty($key);
    }
}
