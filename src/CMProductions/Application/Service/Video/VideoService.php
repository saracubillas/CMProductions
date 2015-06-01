<?php

namespace CMProductions\Application\Service\Video;

use CMProductions\Application\Service\ApplicationService;
use CMProductions\Domain\Model\Video\VideoRepository;

abstract class VideoService implements ApplicationService
{
    /**
     * @var VideoRepository
     */
    protected $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }
}
