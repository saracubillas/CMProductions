<?php

namespace CMProductions\Domain\Model;


use CMProductions\Domain\Model\Video\Video;

class ParserGlorfTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ParserGlorf
     */
    private  $parserGlorf;
    private $dummyFeed;

    public function setUp()
    {
        $this->parserGlorf = new ParserGlorf();
        $this->dummyFeed = '{"videos": [{"tags": ["some","tags"],"url": "http://glorf.com/videos/3","title": "video name"}]}';
    }


    /** @test */
    public function parserGlorf()
    {
        $this->parserGlorf = $this->getMock(
            ParserGlorf::class,
            ['getFeed']
        );
        $this->parserGlorf
            ->expects($this->any())
            ->method('getFeed')
            ->will($this->returnValue($this->dummyFeed));

        $expectedValue[] = new Video('video name', ['some', 'tags'], 'http://glorf.com/videos/3');
        $videos = $this->parserGlorf->parse();
        $this->assertInstanceOf(Video::class, $videos[0]);

    }
}
 