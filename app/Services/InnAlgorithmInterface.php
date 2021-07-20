<?php

namespace App\Services;

interface InnAlgorithmInterface
{
    public function checkDecimal(string $inn): bool;

    public function checkTwelve(string $inn): bool;
}
