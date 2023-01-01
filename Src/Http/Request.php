<?php

namespace Src\Http;

use Src\Services\Converter;

class Request
{
    private ?array $parsedBody;
    private array $queryParams;


    public function __construct(array $queryParams = [],array $parsedBody = null)
    {
        $this->queryParams = $queryParams;
        $this->parsedBody = $parsedBody;
    }



    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function getParsedBody()
    {
        return $this->parsedBody;
    }
}
