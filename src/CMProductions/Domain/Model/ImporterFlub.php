<?php

namespace CMProductions\Domain\Model;

use CMProductions\Domain\Model\Video\Video;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;

class ImporterFlub extends Importer
{

    public function import()
    {
        try {
            $yaml = new Parser();

            $yamlContent = $yaml->parse(file_get_contents(__DIR__.'/../../../../'.self::VIDEOS_FEED_FOLDER.'/flub', FILE_USE_INCLUDE_PATH));

            foreach ($yamlContent as $video)
            {
                $this->repository->persist(new Video(1, $video->name, $video->labels));
            }
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }

}
