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
                $tags = isset($video['labels']) ? explode(',' , $video['labels']) : [];
                $videos[] = new Video($video['name'], $tags , $video['url']);
            }

            return $videos;

        } catch (\Exception $e) {
            throw new ParsingErrorException("Unable to parse the YAML string. ". $e->getMessage());
        }
    }
}
