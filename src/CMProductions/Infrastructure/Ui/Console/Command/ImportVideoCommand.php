<?php

namespace CMProductions\Infrastructure\Ui\Console\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportVideoCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('import:video')
            ->setDescription('Video importer')
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'file with the list of videos'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');


//        $text = file_get_contents($file);
        $output->writeln(__DIR__);
    }
}
