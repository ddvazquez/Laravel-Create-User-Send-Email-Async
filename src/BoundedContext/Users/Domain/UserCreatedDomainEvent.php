<?php

declare(strict_types = 1);

namespace Spfc\BoundedContext\Users\Domain;

use Spfc\Shared\Domain\Bus\Event\DomainEvent;

final class UserCreatedDomainEvent extends DomainEvent
{
    private $name;
    private $email;

    public function __construct(
        string $id,
        string $name,
        string $email,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);

        $this->name     = $name;
        $this->email = $email;
    }

    public static function eventName(): string
    {
        return 'user.created';
    }

    public function toPrimitives(): array
    {
        return [
            'name'     => $this->name,
            'email' => $this->email,
        ];
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['name'], $body['email'], $eventId, $occurredOn);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }
}
