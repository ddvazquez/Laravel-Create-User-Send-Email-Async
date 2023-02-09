<?php

namespace Spfc\BoundedContext\Notifications\Domain;

use Spfc\BoundedContext\Users\Domain\User;

interface Notification
{
    /**
     * @param string $email
     * @param string $subject
     * @param string $content
     * @return void
     */
    public function send(string $email, string $subject,  string $content): void;
}
