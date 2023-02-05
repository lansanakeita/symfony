<?php

namespace App\Command;

use App\Service\EncryptService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'assign-room',
    description: 'This command allows to assign a room to a workshop according to the capacity of 
                  the room and the number of registered in the workshop.',
)]
class AssignRoomCommand extends Command
{
    private $encryptService;

    public function __construct(EncryptService $encryptService){
        $this->encryptService = $encryptService;
        parent::__construct();
    }


    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->encryptService->assignRooms();

        $output->writeln("Rooms have been allocated to the workshops");

        return Command::SUCCESS;
    }
}
