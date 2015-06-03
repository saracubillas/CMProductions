<?php

namespace CMProductions\Infrastructure\Persistence\InMemory;

use CMProductions\Domain\Model\Video\Video;
use CMProductions\Domain\Model\Video\VideoRepository as VideoRepositoryInterface;

class VideoRepository implements VideoRepositoryInterface 
{

    /**
     * @var Video[]
     */
    private $videos = [];

    /**
     * @param $videoId
     * @return mixed
     */
    public function videoOfId($videoId)
    {
        return $this->videos[$videoId];
    }


    /**
     * {@inheritdoc}
     */
    public function persist(Video $video)
    {
        $this->videos[$video->id()] = $video;
    }

    /**
     * {@inheritdoc}
     */
    public function remove(Video $video)
    {
        unset($this->videos[$video->id()]);
    }

    public function findAllVideos()
    {
        return $this->videos;
    }
} 