<?php
declare(strict_types=1);

namespace Src\Services;

final class ConvertClass
{
    public function __construct(
        private readonly int    $sum,
        private readonly string $file
    ) {

    }

    public function getNumber(): float
    {
        return $this->sum($this->sum, $this->file);
    }
    


    private function getFile($file): object
    {
        return $currenciesFile = json_decode(file_get_contents($file));
    }

    private function sum($sum, $file): float
    {
        return ceil($sum * $this->getFile($file)->rates->USD);
    }
}