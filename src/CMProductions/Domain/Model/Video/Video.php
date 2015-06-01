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

    protected $tags;

    /**
     * @var \DateTime
     */
    protected $createdOn;

    /**
     * @var \DateTime
     */
    protected $updatedOn;

    public function __construct($videoId, $name, $tags)
    {
        $this->videoId = $videoId;
        $this->name = $name;
        $this->tags = $tags;

        $this->createdOn = new \DateTime();
        $this->updatedOn = new \DateTime();
    }

    public function id()
    {
        return $this->videoId;
    }

}
