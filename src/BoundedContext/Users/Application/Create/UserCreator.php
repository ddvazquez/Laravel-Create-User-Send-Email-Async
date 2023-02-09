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
        $isIdUnique = $this->repository->isIdUnique($request->id());
        $id       = new UserId($request->id(), $isIdUnique);

        $name     = new UserName($request->name());

        $isEmailUnique = $this->repository->isEmailUnique($request->email());
        $email = new UserEmail($request->email(), $isEmailUnique);
        $password = new UserPassword($request->password());


        $user = User::create($id, $name, $email, $password);

        $this->repository->save($user);
    }

}
