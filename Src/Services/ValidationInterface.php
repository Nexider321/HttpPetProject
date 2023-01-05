<?php

declare(strict_types=1);

namespace Src\Services;

use Src\Http\RunRequests;

interface ValidationInterface
{
    public function isValid(RunRequests $key): bool;

    public function isNumeric(RunRequests $key): bool;

    public function isEmpty(RunRequests $key): bool;

    public function isKeySuccess(RunRequests $key): bool;
}
