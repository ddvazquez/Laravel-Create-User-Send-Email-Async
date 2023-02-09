<?php

declare(strict_types=1);

namespace Spfc\BoundedContext\Users\Application\Create;

final class CreateUserRequest
{
    private string $id;

    private string $name;

    private string $email;

    private string $password;

    /**
     * @param  string  $id
     * @param  string  $name
     * @param  string  $email
     * @param  string  $password
     */
    public function __construct(string $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }
}
