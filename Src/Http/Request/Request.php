<?php

namespace Src\Http\Request;

final class Request
{
    private readonly ?array $parsedBody;
    private array $queryParams;

    public function __construct(
        array  $queryParams = [],
        array $parsedBody = null
    ) {
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
