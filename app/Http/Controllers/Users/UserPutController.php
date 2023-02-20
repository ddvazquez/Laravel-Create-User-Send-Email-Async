<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spfc\BoundedContext\Users\Application\Create\CreateUserRequest;
use Spfc\BoundedContext\Users\Application\Create\UserCreator;

final class UserPutController
{
    private UserCreator $creator;

    /**
     * @param  UserCreator  $creator
     */
    public function __construct(UserCreator $creator)
    {
        $this->creator = $creator;
    }

    /**
     * @param  string  $id
     * @param  Request  $request
     * @return Response
     */
    public function __invoke(string $id, Request $request): Response
    {
        try {
            $this->creator->__invoke(
                new CreateUserRequest(
                    $id,
                    $request->get('name'),
                    $request->get('email'),
                    $request->get('password')
                )
            );

            return new response('', Response::HTTP_CREATED);
        } catch (\InvalidArgumentException $ex) {
            return new response($ex->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
