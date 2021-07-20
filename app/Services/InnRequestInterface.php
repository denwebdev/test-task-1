<?php

namespace App\Services;

use App\DTO\InnResponseDTO;

interface InnRequestInterface
{
    public function get(string $inn): InnResponseDTO;
}
