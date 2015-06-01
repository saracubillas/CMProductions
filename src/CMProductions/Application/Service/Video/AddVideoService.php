<?php

namespace CMProductions\Application\Service\Video;

use CMProductions\Domain\Model\Video\Video;

class AddVideoService extends VideoService
{

    public function execute($request = null)
    {
        $videoId = $request->videoId();
        $name = $request->name();
        $tags = $request->tags();

        $this->videoRepository->persist(
           new Video($videoId, $name, $tags)
        );
    }
}
