<?php declare(strict_types=1);


namespace Spfc\BoundedContext\Users\Application\Create;

use Spfc\BoundedContext\Users\Domain\User;
use Spfc\BoundedContext\Users\Domain\UserEmail;
use Spfc\BoundedContext\Users\Domain\UserId;
use Spfc\BoundedContext\Users\Domain\UserName;
use Spfc\BoundedContext\Users\Domain\UserPassword;
use Spfc\BoundedContext\Users\Domain\UserRepository;
use Spfc\Shared\Domain\Bus\Event\EventBus;

final class UserCreator
{

    private $repository;
    private $bus;
    public function __construct(UserRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus = $bus;
    }

    public function __invoke(CreateUserRequest $request)
    {

        $id       = new UserId($request->id());
        $name     = new UserName($request->name());
        $email = new UserEmail($request->email());
        $password = new UserPassword($request->password());

        $isIdUnique = $this->repository->isIdUnique($request->id());
        $isEmailUnique = $this->repository->isEmailUnique($request->email());

        $user = User::create($id, $name, $email, $password, $isIdUnique, $isEmailUnique);

        $this->repository->save($user);

        $this->bus->publish(...$user->pullDomainEvents());
    }

}
