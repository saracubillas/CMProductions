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
            $yamlContent = $yaml->parse(file_get_contents(__DIR__.'/../../../../feed-exports/flub', FILE_USE_INCLUDE_PATH));
            $videos = [];

            foreach ($yamlContent as $video)
            {
                $videos[] = new Video($video->name, $video->labels, $video->url);
            }
        } catch (ParseException $e) {
            throw new ParsingErrorException("Unable to parse the YAML string. ". $e->getMessage());
        }
    }
}
