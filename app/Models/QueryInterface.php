<?php

namespace App\Models;

interface QueryInterface
{
    public function isNew(): bool;

    public function isExpired(): bool;

    public function getQuery(string $inn): self;

    public function saveMessage(string $message): void;

    public function setCorrect(): void;

    public function isCorrect(): bool;
}
