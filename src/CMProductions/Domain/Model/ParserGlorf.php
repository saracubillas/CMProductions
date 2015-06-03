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
        $jsonContent = $this->getFeed();
        $objectContent = json_decode($jsonContent);
        $videos = [];
        foreach ($objectContent->videos as $video)
        {
            $videos[] = new Video($video->title, $video->tags, $video->url);
        }

        return $videos;
    }

    /**
     * @return string
     * @throws ParsingErrorException
     */
    protected function getFeed()
    {
        try {
            return file_get_contents(__DIR__ . '/../../../../feed-exports/glorf', FILE_USE_INCLUDE_PATH);
        } catch (\Exception $e) {
            throw new ParsingErrorException("Unable to parse the JSON string. ". $e->getMessage());
        }
    }

}
