<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Notifications\Application\Notify;

use function Lambdish\Phunctional\apply;
use Spfc\BoundedContext\Users\Domain\UserCreatedDomainEvent;
use Spfc\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class SendWelcomeNotificationOnUserCreated implements DomainEventSubscriber
{
    private $notifier;

    /**
     * @param  UserWelcomeNotifier  $notifier
     */
    public function __construct(UserWelcomeNotifier $notifier)
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
        dd('notifico');
        /* apply($this->notifier, [$userId]);*/
    }
}
