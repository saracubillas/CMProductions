<?php

namespace CMProductions\Infrastructure\Persistence\MySQL;

use CMProductions\Domain\Model\Video\Video;
use CMProductions\Domain\Model\Video\VideoRepository as VideoRepositoryInterface;

/**
 * Class VideoRepository
 * @package CMProductions\Infrastructure\Persistence\MySQL
 */
class VideoRepository implements  VideoRepositoryInterface
{

    protected $databaseConnection;

    protected $cache;
    public function __construct($databaseConnection, $cache)
    {
        $this->databaseConnection = $databaseConnection;
        $this->cache = $cache;

    }
    /**
     * @param $videoId
     * @return mixed
     */
    public function videoOfId($videoId)
    {
        $sql = "SELECT id, name, url, tags FROM Videos WHERE id = ?";
        $searchedVideo = $this->databaseConnection->Execute($sql);
        while ($record = $searchedVideo->FetchRow()) {
            $video = new Video($record->name, $record->url, $record->tags, $record->id);
            $videos[] = $video;
        }

        return $videos;
    }


    /**
     * @param Video $video
     * @throws \Exception
     */
    public function persist(Video $video)
    {
        $sql = "INSERT INTO Videos "
            . "(id, name, url, tags) "
            . " VALUES "
            . "(?, ?, ?, ?) ";
        $binds = [$video->id(), $video->name(), $video->url(), implode(',', $video->tags())];
        try {
            $this->databaseConnection->Execute($sql, $binds);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param Video $video
     */
    public function remove(Video $video)
    {
        $sql = "DELETE FROM Videos WHERE id = ?";
        $binds = $video->id();
        $this->databaseConnection->Execute($sql, $binds);
    }

}