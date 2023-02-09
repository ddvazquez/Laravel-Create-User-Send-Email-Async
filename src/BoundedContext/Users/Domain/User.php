<?php declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Domain;

final class User
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

    public static function create(UserId $id, UserName $name, UserEmail $email, UserPassword $password): self
    {
        $user = new self($id, $name, $email, $password);

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
