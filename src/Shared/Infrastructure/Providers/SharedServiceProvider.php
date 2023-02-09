<?php

declare(strict_types=1);

namespace Spfc\Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

use Spfc\BoundedContext\Notifications\Application\Notify\SendWelcomeNotificationOnUserCreated;
use Spfc\BoundedContext\Users\Domain\UserRepository;
use Spfc\BoundedContext\Users\Infrastructure\Persistence\EloquentUserRepository;
use Spfc\Shared\Domain\Bus\Event\EventBus;
use Spfc\Shared\Infrastructure\Bus\Event\InMemory\InMemorySymfonyEventBus;
use Src\Profile\Application\Find\GetProfileQueryHandler;
use Src\Profile\Application\Update\UpdateProfileHandler;
use Src\Shared\Domain\Bus\Command\CommandBus;
use Src\Shared\Domain\Bus\Query\QueryBus;
use Src\Shared\Infrastructure\Bus\Command\InMemorySymfonyCommandBus;
use Src\Shared\Infrastructure\Bus\Query\InMemorySymfonyQueryBus;

final class SharedServiceProvider extends ServiceProvider
{
    public array $bindings = [
        EventBus::class => InMemorySymfonyEventBus::class,
    ];

    public function boot()
    {
        $this->app->tag([
            SendWelcomeNotificationOnUserCreated::class,
        ], 'domain_event_subscriber');

        $this->app->bind(InMemorySymfonyEventBus::class, function ($app) {
            return new InMemorySymfonyEventBus($app->tagged('domain_event_subscriber'));
        });
    }
}
