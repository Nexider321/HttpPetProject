<?php

namespace http;
use App\Converter;



class Request {



    public function getQueryParams()
    {
        return $_GET['pay'];
    }


}