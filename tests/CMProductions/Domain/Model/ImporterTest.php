<?php

namespace CMProductions\Domain\Model;


use CMProductions\Infrastructure\Persistence\InMemory\VideoRepository;

class ImporterTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function printTheText()
    {
        $repository = new VideoRepository();
        $file ='file.txt';
        $importer = new ImporterGlorf($repository);
        $importer->import();
//        var_dump($repository->findAllVideos());

    }
    /** @test */
    public function flub()
    {
        $repository = new VideoRepository();
        $importer = new ImporterFlub($repository);
        $importer->import();
        var_dump($repository->findAllVideos());

    }
}
 