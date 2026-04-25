<?php

namespace App\Services\Feedback\Savers;

use App\Services\Feedback\Contracts\SaverInterface;

class EmailSaver implements SaverInterface
{
    public function save(array $data): void
    {
        logger()->info('Saved feedback to email channel', $data);
    }
}
