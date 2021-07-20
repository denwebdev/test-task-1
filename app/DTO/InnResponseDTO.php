<?php

declare(strict_types=1);

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class InnResponseDTO extends DataTransferObject
{
    public ?string $status;

    public string $message;
}
