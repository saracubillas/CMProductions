<?php

namespace CMProductions\Domain\Model;

use CMProductions\Domain\Model\Video\VideoRepository;

abstract class Importer
{
    const VIDEOS_FEED_FOLDER = 'feed-exports/';
    /**
     * @var VideoRepository
     */
    protected $repository;

    /**
     * @param string $repository
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    abstract public function import();
}