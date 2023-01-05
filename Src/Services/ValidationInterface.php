<?php

declare(strict_types=1);

namespace Src\Services;

use Src\Http\RunRequests;

interface ValidationInterface
{
    public function isValid(RunRequests $key);

    public function isNumeric(RunRequests $key);

    public function isEmpty(RunRequests $key);

    public function isKeySuccess(RunRequests $key);
}
