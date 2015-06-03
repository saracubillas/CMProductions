<?php

namespace CMProductions\Domain\Model;


use CMProductions\Domain\Model\Video\Video;
use CMProductions\Infrastructure\Persistence\InMemory\VideoRepository;

class ImporterTest extends \PHPUnit_Framework_TestCase
{
    /** @var  VideoRepository */
    public $repository;
    /** @var  Parser */
    public $parser;
    /** @var  Importer */
    public $importer;
    public $videoTest1;
    public $videoTest2;

    public function setUp()
    {
        $this->repository = new VideoRepository();
        $this->parser = new DummyParser();
        $this->importer = new Importer($this->repository, $this->parser);
        $this->videoTest1 = __DIR__ . '/../../../../videos/testVideo1';
        $this->videoTest2 = __DIR__ . '/../../../../videos/testVideo2';
    }

    /** @test */
    public function import()
    {
        $this->deleteTestVideos();
        $this->importer->import();
        $video1 = new Video('video1',['some', 'tags'], __DIR__. '/../../DummyVideos/a', 'testVideo1');
        $video2 = new Video('video2',['some', 'tags'], __DIR__. '/../../DummyVideos/b', 'testVideo2');
        $this->assertEquals(['testVideo1' => $video1, 'testVideo2' => $video2], $this->repository->findAllVideos());
        $this->assertTrue(file_exists($this->videoTest1));
        $this->assertTrue(file_exists($this->videoTest2));
        $this->deleteTestVideos();
    }

    private function deleteTestVideos()
    {
        if (file_exists($this->videoTest1))
        {
            unlink($this->videoTest1);
        }
        if (file_exists($this->videoTest2))
        {
            unlink($this->videoTest2);
        }
    }
}

class DummyParser implements Parser
{
    public function parse()
    {
        $video1 = new Video('video1',['some', 'tags'], __DIR__. '/../../DummyVideos/a', 'testVideo1');
        $video2 = new Video('video2',['some', 'tags'], __DIR__. '/../../DummyVideos/b', 'testVideo2');

        return [$video1, $video2];
    }
}