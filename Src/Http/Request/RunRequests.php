<?php

namespace Src\Http\Request;

use Exception;
use Src\Http\Query\File;
use Src\Http\Query\Telegram;
use Src\Http\Query\Validation\CreateQueryValidation;
use Src\Http\Query\Validation\TelegramQueryValidation;
use Src\Http\Query\Validation\ValidationInterface;

class RunRequests
{
    public array $get;


    /**
     * @throws Exception
     */
    public function __construct(Request $request)
    {
        $this->get = $request->getQueryParams();
        $this->isQueryHasCreate();
        $this->isQueryHasPay();
    }

    /**
     * @throws Exception
     */
    public function isQueryHasCreate(): void
    {
        if (isset($this->get['create'])) {
            $key = (string) $this->get['create'];
            new File(new CreateQueryValidation(), $key);
        }
    }

    /**
     * @throws Exception
     */
    public function isQueryHasPay(): void
    {
        if (isset($this->get['pay'])) {
            $key = (string) $this->get['pay'];
            new Telegram(new TelegramQueryValidation(), $key);
        }
    }
}
