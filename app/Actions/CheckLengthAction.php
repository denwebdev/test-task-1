<?php

declare(strict_types=1);

namespace App\Actions;

class CheckLengthAction
{
    public const INN_MIN_VALUE = 10;

    public const INN_MAX_VALUE = 12;

    public static function execute($value): int
    {
        if (strlen((string)$value) === self::INN_MIN_VALUE) {
            return self::INN_MIN_VALUE;
        }

        if (strlen((string)$value) === self::INN_MAX_VALUE) {
            return self::INN_MAX_VALUE;
        }

        return 0;
    }
}
