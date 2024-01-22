<?php

namespace App\Core\User\UserInterface\Cli;

use App\Core\User\Application\Query\GetEmailsByInactiveStatus\GetEmailsByInactiveStatusQuery;
use App\Core\User\Domain\Status\UserStatus;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:user:get-emails-inactive-users',
    description: 'Pobieranie adresów email nieaktywnych użtkowników'
)]
class GetInactiveUser extends Command
{
    public function __construct(private readonly MessageBusInterface $bus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $inactiveEmails = $this
            ->bus
            ->dispatch(new GetEmailsByInactiveStatusQuery(UserStatus::UN_ACTIVE));

        foreach ($inactiveEmails as $email) {
            $output->writeln($email);
        }

        return Command::SUCCESS;
    }

    protected function configure(): void
    {
    }
}
