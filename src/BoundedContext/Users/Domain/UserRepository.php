<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Domain;

interface UserRepository
{
    /**
     * @param  User  $user
     * @return void
     */
    public function save(User $user): void;

    /**
     * @param  UserId  $id
     * @return User|null
     */
    public function search(UserId $id): ?User;

    /**
     * @param  string  $email
     * @return bool|null
     */
    public function isEmailUnique(string $email): ?bool;

    /**
     * @param  string  $id
     * @return bool|null
     */
    public function isIdUnique(string $id): ?bool;
}
