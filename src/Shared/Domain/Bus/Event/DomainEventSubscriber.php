<?php

declare(strict_types=1);

namespace Spfc\Shared\Domain\Bus\Event;

interface DomainEventSubscriber
{
    /**
     * @return array
     */
    public static function subscribedTo(): array;
}
