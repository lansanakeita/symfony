<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\EncryptService;

#[AsCommand(
    name: 'encrypt:data',
    description: 'This command helps you to encrypt the given data using Symfony',
)]
class EncryptDataCommand extends Command
{
    private $encryptservice;
   

    public function __construct(EncryptService $encryptservice){

         $this->encryptservice = $encryptservice;
         

         parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->encryptservice->EncryptData();

        $output->writeln("Commande réussie : Données personnelles des utilisateurs chiffrées");

        return Command::SUCCESS;
    }
}
