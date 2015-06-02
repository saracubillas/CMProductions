<?php

namespace CMProductions\Domain\Model;


class ParserGlorfTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ParserGlorf
     */
    public $parserGlorf;

    public function setUp()
    {
        $this->parserGlorf = new ParserGlorf();
    }
    /** @test */
    public function ParserGlorf()
    {
        $this->parserGlorf->parse();

    }
}
 