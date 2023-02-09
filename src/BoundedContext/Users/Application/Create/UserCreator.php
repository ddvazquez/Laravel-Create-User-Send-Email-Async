<?php declare(strict_types=1);


namespace Spfc\BoundedContext\Users\Application\Create;

use Spfc\BoundedContext\Users\Domain\User;
use Spfc\BoundedContext\Users\Domain\UserEmail;
use Spfc\BoundedContext\Users\Domain\UserId;
use Spfc\BoundedContext\Users\Domain\UserName;
use Spfc\BoundedContext\Users\Domain\UserPassword;
use Spfc\BoundedContext\Users\Domain\UserRepository;

final class UserCreator
{

    private $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateUserRequest $request)
    {
        $id       = new UserId($request->id());
        $name     = new UserName($request->name());
        $email = new UserEmail($request->email());
        $password = new UserPassword($request->password());

        $user = User::create($id, $name, $email, $password);

        $this->repository->save($user);
    }

}
