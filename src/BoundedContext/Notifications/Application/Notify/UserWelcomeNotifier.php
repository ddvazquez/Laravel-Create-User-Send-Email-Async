<?php

declare(strict_types = 1);

namespace Spfc\BoundedContext\Notifications\Application\Notify;

final class UserWelcomeNotifier
{

    public function __construct(
        // Implementation of send notification interface
    ) {

    }

    public function __invoke($email, $name)
    {
        dd('send email');
    }
}
