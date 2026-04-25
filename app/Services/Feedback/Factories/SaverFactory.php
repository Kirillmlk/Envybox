<?php

namespace App\Services\Feedback\Factories;

use App\Services\Feedback\Savers\DatabaseSaver;
use App\Services\Feedback\Savers\EmailSaver;


readonly class SaverFactory
{
    public function make($channel): DatabaseSaver|EmailSaver
    {
        return match ($channel) {
            'database' => new DatabaseSaver(),
            'email' => new EmailSaver(),
            default => throw new \Exception('Not implemented')
        };
    }

}
