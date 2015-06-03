<?php

namespace CMProductions\Domain\Model;

use CMProductions\Domain\Model\Video\Video;
use CMProductions\Domain\Model\Video\VideoRepository;

class Importer
{
    const VIDEOS_FOLDER = '/../../../../videos/';
    /**
     * @var VideoRepository
     */
    protected $repository;
    /**
     * @var Parser
     */
    private $parser;

    /**
     * @param VideoRepository|string $repository
     * @param Parser $parser
     */
    public function __construct(VideoRepository $repository, Parser $parser)
    {
        $this->repository = $repository;
        $this->parser = $parser;
    }

    /**
     * @throws DownloadingException
     */
    public function import()
    {
        /** @var Video[] $videos */
        $videos = $this->parser->parse();

        foreach ($videos as $video)
        {
            $this->download($video) ?:
            $this->repository->persist($video);
        }
    }

    /**
     * @param $video
     * @return bool
     * @throws DownloadingException
     */
    protected function download(Video $video)
    {
        $content = @file_get_contents($video->url());
        if ($content === false) {
//            throw new DownloadingException('error downloading the video'.$video->url());
            printf("error downloading video %s: \n", $video->url());
        }

        file_put_contents(__DIR__ . self::VIDEOS_FOLDER . $video->id(), $content);
        $this->printOuput($video);

        return true;
    }

    private function printOuput(Video $video)
    {
        printf("importing: ' %s '; URL: %s ; Tags: %s  ; \n", $video->name(), $video->url(), implode(',' , $video->tags()));
    }

}