<?php declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Domain;

interface UserRepository
{
    public function save(User $user): void;

    public function search(UserId $id): ?User;
}