<?php

declare(strict_types=1);

namespace Src\Http;

final class RequestHandler
{
    private array $get;

//    public function __construct(
//        Request $request
//    ) {
//        $this->get = $request->getQueryParams();
//    }
    public function __invoke(): string
    {
        return "OK";
    }
}
