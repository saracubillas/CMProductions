<?php

namespace CMProductions\Domain\Model;

use CMProductions\Domain\Model\Video\Video;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser as SymfonyYamlParser;

class ParserFlub implements Parser
{

    public function parse()
    {
        try {
            $yaml = new SymfonyYamlParser();
            $yamlContent = $yaml->parse(file_get_contents(__DIR__.'/../../../../'.self::VIDEOS_FEED_FOLDER.'/flub', FILE_USE_INCLUDE_PATH));

            $videos = [];

            foreach ($yamlContent as $video)
            {
                $videos[] = new Video(1, $video->name, $video->labels, $video->url);
            }
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }

}
