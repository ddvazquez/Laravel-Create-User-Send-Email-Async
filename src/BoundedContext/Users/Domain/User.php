<?php declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Domain;

use Spfc\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    private UserId $id;
    private UserName $name;
    private UserEmail $email;
    private UserPassword $password;


    /**
     * @param UserId $id
     * @param UserName $name
     * @param UserEmail $email
     * @param UserPassword $password
     */
    public function __construct(UserId $id, UserName $name, UserEmail $email, UserPassword $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public static function create(UserId $id, UserName $name, UserEmail $email, UserPassword $password, bool $isIdUnique, bool $isEmailUnique): self
    {
        if(!$isIdUnique) {
            throw new \InvalidArgumentException(
                sprintf('<%s> id already exists.', $id)
            );
        }

        if(!$isEmailUnique) {
            throw new \InvalidArgumentException(
                sprintf('<%s> email already exists.', $email)
            );
        }

        $user = new self($id, $name, $email, $password);

        $user->record(new UserCreatedDomainEvent($id->value(), $name->value(), $email->value()));

        return $user;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }
}
