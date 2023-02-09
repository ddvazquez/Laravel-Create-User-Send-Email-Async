<?php

declare(strict_types = 1);

namespace Spfc\BoundedContext\Notifications\Application\Notify;

use Spfc\BoundedContext\Users\Domain\UserCreatedDomainEvent;
use Spfc\BoundedContext\Users\Domain\UserId;
use Spfc\Shared\Domain\Bus\Event\DomainEventSubscriber;
use function Lambdish\Phunctional\apply;

final class SendWelcomeNotificationOnUserCreated implements DomainEventSubscriber
{
    private $notifier;

    public function __construct(UserWelcomeNotifier $notifier)
    {
        $this->notifier = $notifier;
    }

    public static function subscribedTo(): array
    {
        return [UserCreatedDomainEvent::class];
    }

    public function __invoke(UserCreatedDomainEvent $event): void
    {
        /* apply($this->notifier, [$userId]);*/

    }
}
