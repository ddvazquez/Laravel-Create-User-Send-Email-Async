<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

use Spfc\BoundedContext\Users\Domain\UserRepository;
use Spfc\BoundedContext\Users\Infrastructure\Persistence\EloquentUserRepository;

final class UserServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserRepository::class => EloquentUserRepository::class,
    ];
}
