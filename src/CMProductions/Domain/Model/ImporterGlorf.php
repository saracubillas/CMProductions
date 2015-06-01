<?php

namespace CMProductions\Domain\Model;

use CMProductions\Domain\Model\Video\Video;

class ImporterGlorf extends Importer
{

    public function import()
    {
        try {
            $jsonContent =  file_get_contents(__DIR__.'/../../../../'.self::VIDEOS_FEED_FOLDER.'/glorf', FILE_USE_INCLUDE_PATH);
            $objectContent = json_decode($jsonContent);
            $videos = $objectContent->videos;
            foreach ( $videos as $video)
            {
                $this->repository->persist(new Video(1, $video->title, $video->tags));
            }
        } catch (\Exception $e) {

        }



    }

}
