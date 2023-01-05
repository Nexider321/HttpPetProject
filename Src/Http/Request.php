<?php

namespace Src\Http;

use Exception;
use Src\Factory\ExchangesFileFactory;

class Request
{
    private readonly ?array $parsedBody;
    private readonly array $queryParams;


    /**
     * @throws Exception
     */
    public function __construct(
        array  $queryParams = [],
        array $parsedBody = null
    ) {
    }


    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function getParsedBody(): ?array
    {
        return $this->parsedBody;
    }
}
