<?php

namespace App\Services;

use App\DTO\InnResponseDTO;

interface InnInterface
{
    public function check(string $inn): InnResponseDTO;

    public function correct(string $inn): bool;
}
