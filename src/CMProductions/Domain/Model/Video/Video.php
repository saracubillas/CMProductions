<?php

namespace CMProductions\Domain\Model\Video;


/**
 * Class Video
 * @package CMProductions\Domain\Model\Video
 */
class Video
{
    /**
     * @var
     */
    protected $videoId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $tags;

    /**
     * @var string
     */
    protected $url;
    /**
     * @var \DateTime
     */
    protected $createdOn;

    /**
     * @var \DateTime
     */
    protected $updatedOn;

    public function __construct($videoId, $name, $tags, $url)
    {
        $this->videoId = $videoId;
        $this->name = $name;
        $this->tags = $tags;
        $this->url = $url;

        $this->createdOn = new \DateTime();
        $this->updatedOn = new \DateTime();

    }

    public function id()
    {
        return $this->videoId;
    }

    public function url()
    {
        return $this->url;
    }

}
