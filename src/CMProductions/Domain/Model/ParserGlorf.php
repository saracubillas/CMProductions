<?php

namespace CMProductions\Domain\Model;

use CMProductions\Domain\Model\Video\Video;

class ParserGlorf implements Parser
{

    public function parse()
    {
        try {
            $jsonContent =  file_get_contents(__DIR__.'/../../../../feed-exports/glorf', FILE_USE_INCLUDE_PATH);
            $objectContent = json_decode($jsonContent);
            $videos = [];
            foreach ($objectContent->videos as $video)
            {
                $videos[] = new Video(1, $video->title, $video->tags, $video->url);
            }

            return $videos;

        } catch (\Exception $e) {

        }
    }

}
