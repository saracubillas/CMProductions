<?php

namespace CMProductions\Infrastructure\Ui\Console\Command;

use CMProductions\Domain\Model\Importer;
use CMProductions\Domain\Model\ParserFlub;
use CMProductions\Domain\Model\ParserGlorf;
use CMProductions\Infrastructure\Persistence\InMemory\VideoRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportVideoCommand extends Command
{
    const GlorfProvider = 'glorf';
    const FlubProvider = 'flub';
    private $repository;
    private $parser;
    private $importer;

    protected function configure()
    {
        $this
            ->setName('import:video')
            ->setDescription('Video importer')
            ->addArgument(
                'type',
                InputArgument::REQUIRED,
                'Which one you wanna import?'
            );
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
            $this->getArguments($input);
            $this->repository = new VideoRepository();
            $this->importer = new Importer($this->repository, $this->parser);
            $this->importer->import();

        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }
    }


    /**
     * @param InputInterface $input
     * @throws \Exception
     */
    protected function getArguments(InputInterface $input)
    {
        $type = $input->getArgument('type');
        if ($type == self::GlorfProvider) {
            $this->parser = new ParserGlorf();
        } elseif ($type == self::FlubProvider) {
            $this->parser = new ParserFlub();
        } else {
            throw new \Exception('invalid type of video provider');
        }
    }
}
