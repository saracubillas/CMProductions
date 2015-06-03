<?php

namespace CMProductions\Domain\Model;

use CMProductions\Domain\Model\Video\Video;

/**
 * Class ParserGlorf
 * @package CMProductions\Domain\Model
 */
class ParserGlorf implements Parser
{

    /**
     * @return array
     * @throws ParsingErrorException
     */
    public function parse()
    {
        try {
            $jsonContent = $this->getFeed();
            $objectContent = json_decode($jsonContent);
            $videos = [];
            foreach ($objectContent->videos as $video)
            {
                $videos[] = new Video($video->title, $video->tags, $video->url);
            }
            return $videos;

        } catch (\Exception $e) {
            throw new ParsingErrorException("Unable to parse the JSON string. ". $e->getMessage());
        }
    }

    /**
     * @return string
     * @throws ParsingErrorException
     */
    protected function getFeed()
    {
        return file_get_contents(__DIR__ . '/../../../../feed-exports/glorf', FILE_USE_INCLUDE_PATH);
    }
}
