<?php

namespace Src\Factory;

use Src\Http\Request\Request;

class RequestFactory
{
    /**
     * @throws \Exception
     */
    public static function create(array $get, array $post): Request
    {
        return new Request($get, $post);
    }
}
