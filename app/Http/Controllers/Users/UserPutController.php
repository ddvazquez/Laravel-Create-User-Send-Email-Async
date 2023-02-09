<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Ramsey\Uuid\Uuid;
use Spfc\BoundedContext\Users\Application\Create\CreateUserRequest;
use Spfc\BoundedContext\Users\Application\Create\UserCreator;


final class UserPutController
{
    private UserCreator $creator;
    public function __construct(UserCreator $creator)
    {
        $this->creator = $creator;
    }
    public function __invoke(string $id, Request $request): Response
    {
        $this->creator->__invoke(
            new CreateUserRequest(
                $id,
                $request->get('name'),
                $request->get('email'),
                $request->get('password')
            )
        );

        return new response('', Response::HTTP_CREATED);
    }
}
