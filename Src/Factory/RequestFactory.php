<?php

namespace Src\Factory;

use Src\Http\Request;

class RequestFactory
{
    /**
     * @throws \Exception
     */
    public static function create($get, $post): Request
    {
        return new Request($get, $post);
    }

}