<?php

declare(strict_types=1);

namespace Spfc\Shared\Infrastructure\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Spfc\BoundedContext\Notifications\Application\Notify\SendWelcomeNotificationOnUserCreated;
use Spfc\BoundedContext\Notifications\Domain\Notification;
use Spfc\BoundedContext\Notifications\Infrastructure\Email\LaravelNotification;
use Spfc\Shared\Domain\Bus\Event\EventBus;
use Spfc\Shared\Infrastructure\Bus\Event\InMemory\InMemorySymfonyEventBus;

final class SharedServiceProvider extends ServiceProvider
{
    public array $bindings = [
        EventBus::class => InMemorySymfonyEventBus::class,
        Notification::class => LaravelNotification::class
    ];

    /**
     * @return void
     */
    public function boot()
    {
        $this->app->tag([
            SendWelcomeNotificationOnUserCreated::class,
        ], 'domain_event_subscriber');

        $this->app->bind(InMemorySymfonyEventBus::class, function (Application $app) {
            return new InMemorySymfonyEventBus($app->tagged('domain_event_subscriber'));
        });
    }
}
