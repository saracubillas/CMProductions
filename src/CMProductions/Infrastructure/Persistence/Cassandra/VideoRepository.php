<?php

namespace CMProductions\Infrastructure\Persistence\Cassandra;

use CMProductions\Domain\Model\Video\Video;
use CMProductions\Domain\Model\Video\VideoRepository as VideoRepositoryInterface;


class VideoRepository implements VideoRepositoryInterface
{
    /**
     * @param $videoId
     * @return mixed
     */
    public function videoOfId($videoId)
    {
        // TODO: Implement videoOfId() method.
    }

    /**
     * @param Video $video
     */
    public function persist(Video $video)
    {
        // TODO: Implement persist() method.
    }

    /**
     * @param Video $video
     */
    public function remove(Video $video)
    {
        // TODO: Implement remove() method.
    }


}