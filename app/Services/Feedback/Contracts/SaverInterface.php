<?php

namespace App\Services\Feedback\Contracts;

interface SaverInterface
{
    public function save(array $data): void;
}
