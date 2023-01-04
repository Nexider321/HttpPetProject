<?php

namespace Src\Http;

use Exception;
use Src\Factory\ExchangesFileFactory;

class Request
{
    private ?array $parsedBody;
    private array $queryParams;


    /**
     * @throws Exception
     */
    public function __construct(array $queryParams = [], array $parsedBody = null)
    {
        $this->queryParams = $queryParams;
        $this->parsedBody = $parsedBody;

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
