<?php

namespace CMProductions\Infrastructure\Ui\Console\Command;


use CMProductions\Domain\Model\Importer;
use CMProductions\Domain\Model\ParserGlorf;
use CMProductions\Infrastructure\Persistence\InMemory\VideoRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportVideoCommand extends Command
{
    private $repository;
    private $parserGlorf;
    private $importer;

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

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return String
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->repository = new VideoRepository();
            $this->parserGlorf = new ParserGlorf();
            $this->importer = new Importer($this->repository, $this->parserGlorf);
            $this->importer->import();
            $output->writeln('importing');
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}
