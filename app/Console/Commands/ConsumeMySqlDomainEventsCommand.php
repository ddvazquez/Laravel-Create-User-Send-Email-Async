<?php

declare(strict_types = 1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Connection;
use Spfc\Shared\Domain\Bus\Event\DomainEvent;
use Spfc\Shared\Infrastructure\Bus\Event\MySql\MySqlEloquentDomainEventsConsumer;
use Spfc\Shared\Infrastructure\Bus\Event\DomainEventSubscriberLocator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use function Lambdish\Phunctional\pipe;

final class ConsumeMySqlDomainEventsCommand extends Command
{
    protected $signature = 'spfc:consume-domain-events:mysql {quantity}';

    protected $description = 'Consume database domain events';

    private MySqlEloquentDomainEventsConsumer $consumer;
    private DomainEventSubscriberLocator $subscriberLocator;
    private Connection $connection;

    /**
     * @param MySqlEloquentDomainEventsConsumer $consumer
     * @param Connection $connection
     * @param DomainEventSubscriberLocator $subscriberLocator
     */
    public function __construct(
        MySqlEloquentDomainEventsConsumer $consumer,
        Connection $connection,
        DomainEventSubscriberLocator $subscriberLocator
    ) {
        $this->consumer          = $consumer;
        $this->subscriberLocator = $subscriberLocator;
        $this->connection       = $connection;

        parent::__construct();
    }


    /**
     * @return void
     */
    public function handle() : void
    {
        $quantityEventsToProcess = (int) $this->argument('quantity');

        $consumer = pipe($this->consumer(), $this->clearConnection());

        $this->consumer->consume($consumer, $quantityEventsToProcess);
    }

    /**
     * @return callable
     */
    private function consumer(): callable
    {
        $command = $this;
        return static function (DomainEvent $domainEvent) use ($command) {
            $subscribers = $command->subscriberLocator->for(get_class($domainEvent));

            foreach ($subscribers as $subscriber) {
                $subscriber($domainEvent);
            }
        };
    }

    /**
     * @return callable
     */
    private function clearConnection(): callable
    {
        return function () {
            $this->connection->disconnect();
        };
    }
}
