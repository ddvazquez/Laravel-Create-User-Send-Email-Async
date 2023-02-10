<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Notifications\Infrastructure\Email;

use Illuminate\Support\Facades\Mail;
use Spfc\BoundedContext\Notifications\Domain\Notification;

final class LaravelNotification implements Notification
{
    /**
     * @param  string  $email
     * @param  string  $subject
     * @param  string  $content
     * @return void
     */
    public function send(string $email, string $subject, string $content): void
    {
        Mail::send([], [], function ($message) use ($email, $subject, $content) {
            $message->to($email)
            ->subject($subject)
            ->html($content);
        });
    }
}
