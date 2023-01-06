<?php

declare(strict_types=1);

namespace Src\Http\Query\Validation;

interface ValidationInterface
{
    public function isValid(string $key): bool;

    public function isNumeric(string $key): void;

    public function isEmpty(string $key): void;
}
