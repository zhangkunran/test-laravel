<?php

namespace App\Services\Struct;

use Throwable;

interface RepService
{
    public function getMsg(): string;

    public function isSuccess(): bool;

    public function hasException(): bool;

    public function getException(): Throwable;
}
