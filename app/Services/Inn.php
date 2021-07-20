<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\CheckLengthAction;
use App\DTO\InnResponseDTO;

class Inn implements InnInterface
{
    private InnAlgorithmInterface $algorithm;

    private InnRequestInterface $request;

    public function __construct(
        InnAlgorithmInterface $algorithm,
        InnRequestInterface $request
    ) {
        $this->algorithm = $algorithm;
        $this->request = $request;
    }

    public function check(string $inn): InnResponseDTO
    {
        return $this->request->get($inn);
    }

    public function correct(string $inn): bool
    {
        $length = CheckLengthAction::execute($inn);

        if ($length === CheckLengthAction::INN_MIN_VALUE) {
            return $this->algorithm->checkDecimal($inn);
        }

        if ($length === CheckLengthAction::INN_MAX_VALUE) {
            return $this->algorithm->checkTwelve($inn);
        }

        return false;
    }
}
