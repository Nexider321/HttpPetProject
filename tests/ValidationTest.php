<?php
declare(strict_types=1);

use Src\Http\Query\Telegram;
use Src\Http\Query\Validation\TelegramQueryValidation;

final class ValidationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws Exception
     */
    public function TelegramTestCreate()
    {
        $telegram = new TelegramQueryValidation();
        $this->assertEquals(false, $telegram->isEmpty('54'));
    }
}