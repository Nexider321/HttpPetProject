<?php

declare(strict_types=1);

namespace Src\Http\Query;

use Exception;
use Src\Http\Query\Validation\ValidationInterface;

final class Telegram
{
    private ValidationInterface $validation;
    private string $key;

    /**
     * @throws Exception
     */
    public function __construct(
        ValidationInterface $validation,
        string $key
    ) {
        $this->validation = $validation;
        $this->key = $key;
        $this->send();
    }


    /**
     * @throws Exception
     */
    public function send(): void
    {
        if ($this->validation->isValid($this->key)) {
            \Src\Services\File::log('TELEGRAM SENDED');
        } else {
            throw new Exception('NOT VALID');
        }
    }
}
