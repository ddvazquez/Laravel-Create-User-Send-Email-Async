<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Notifications\Application\Notify;

use Spfc\BoundedContext\Notifications\Domain\Notification;
use function Lambdish\Phunctional\apply;
use Spfc\BoundedContext\Users\Domain\UserCreatedDomainEvent;
use Spfc\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class SendWelcomeNotificationOnUserCreated implements DomainEventSubscriber
{
    private Notification $notifier;

    /**
     * @param  Notification $notifier
     */
    public function __construct(Notification $notifier)
    {
        $this->notifier = $notifier;
    }

    /**
     * @return string[]
     */
    public static function subscribedTo(): array
    {
        return [UserCreatedDomainEvent::class];
    }

    /**
     * @param  UserCreatedDomainEvent  $event
     * @return void
     */
    public function __invoke(UserCreatedDomainEvent $event): void
    {
         $this->notifier->send($event->email(), 'Welcome', sprintf('Welcome %s', $event->name()));
    }
}
