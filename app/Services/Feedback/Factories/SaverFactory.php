<?php

namespace App\Services\Feedback\Factories;

use App\Services\Feedback\Savers\DatabaseSaver;
use App\Services\Feedback\Savers\EmailSaver;


readonly class SaverFactory
{
    public function __construct(
        private readonly string $channel
    ) {}

    public function save(array $data): void
    {
        $saver = $this->buildSaver();
        $saver->save($data);
    }

    public function buildSaver(): DatabaseSaver|EmailSaver
    {
        return match ($this->channel) {
            'database' => new DatabaseSaver(),
            'email' => new EmailSaver(),
            default => throw new \InvalidArgumentException("Unsupported channel: {$this->channel}")
        };
    }

}
