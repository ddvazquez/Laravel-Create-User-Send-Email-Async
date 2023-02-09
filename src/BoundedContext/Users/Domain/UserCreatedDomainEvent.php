<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Domain;

use Spfc\Shared\Domain\Bus\Event\DomainEvent;

final class UserCreatedDomainEvent extends DomainEvent
{
    private string $name;

    private string $email;

    /**
     * @param  string  $id
     * @param  string  $name
     * @param  string  $email
     * @param  string|null  $eventId
     * @param  string|null  $occurredOn
     */
    public function __construct(
        string $id,
        string $name,
        string $email,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);

        $this->name = $name;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public static function eventName(): string
    {
        return 'user.created';
    }

    /**
     * @return array
     */
    public function toPrimitives(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }

    /**
     * @param  string  $aggregateId
     * @param  array  $body
     * @param  string  $eventId
     * @param  string  $occurredOn
     * @return UserCreatedDomainEvent
     */
    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): UserCreatedDomainEvent {
        return new self($aggregateId, $body['name'], $body['email'], $eventId, $occurredOn);
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }
}
