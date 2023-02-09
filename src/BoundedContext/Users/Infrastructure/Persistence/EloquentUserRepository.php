<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Infrastructure\Persistence;

use Spfc\BoundedContext\Users\Domain\User;
use Spfc\BoundedContext\Users\Domain\UserEmail;
use Spfc\BoundedContext\Users\Domain\UserId;
use Spfc\BoundedContext\Users\Domain\UserName;
use Spfc\BoundedContext\Users\Domain\UserRepository;
use Spfc\BoundedContext\Users\Infrastructure\Persistence\Eloquent\UserEloquentModel;

final class EloquentUserRepository implements UserRepository
{
    /**
     * @param  User  $user
     * @return void
     */
    public function save(User $user): void
    {
        $model = new UserEloquentModel();
        $model->id = $user->id()->value();
        $model->name = $user->name()->value();
        $model->email = $user->email()->value();
        $model->password = $user->password()->value();

        $model->save();
    }

    /**
     * @param  UserId  $id
     * @return User|null
     */
    public function search(UserId $id): ?User
    {
        $model = UserEloquentModel::find($id->value());

        if (null === $model) {
            return null;
        }

        // return new User(new UserId($model->id), new UserName($model->name), new UserEmail($model->email)); // TODO
    }

    /**
     * @param  string  $email
     * @return bool|null
     */
    public function isEmailUnique(string $email): ?bool
    {
        return ! UserEloquentModel::where('email', '=', $email)->count();
    }

    /**
     * @param  string  $id
     * @return bool|null
     */
    public function isIdUnique(string $id): ?bool
    {
        return ! UserEloquentModel::where('id', '=', $id)->count();
    }
}
