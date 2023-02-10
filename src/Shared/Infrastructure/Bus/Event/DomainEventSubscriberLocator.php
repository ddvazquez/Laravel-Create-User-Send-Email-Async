<?php

declare(strict_types = 1);

namespace Spfc\Shared\Infrastructure\Bus\Event;

use Spfc\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;

final class DomainEventSubscriberLocator
{
    private iterable $mapping;

    /**
     * @param iterable $mapping
     */
    public function __construct(iterable $mapping)
    {
        $this->mapping = CallableFirstParameterExtractor::forPipedCallables($mapping);
    }

    /**
     * @param string $eventClass
     * @return iterable
     */
    public function for(string $eventClass):iterable
    {
        return $this->mapping[$eventClass];
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->mapping;
    }
}
