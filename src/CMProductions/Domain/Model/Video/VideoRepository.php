<?php

namespace CMProductions\Domain\Model\Video;

/**
 * Interface VideoRepository
 * @package CMProductions\Domain\Model\Video
 */
interface VideoRepository
{
    /**
     * @param $videoId
     * @return mixed
     */
    public function videoOfId($videoId);

    /**
     * @param Video $video
     */
    public function persist(Video $video);

    /**
     * @param Video $video
     */
    public function remove(Video $video);

}
