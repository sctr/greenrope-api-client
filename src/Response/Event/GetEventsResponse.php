<?php

namespace Sctr\Greenrope\Api\Response\Event;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetEventsResponse")
 */
class GetEventsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Event>")
     * @Serializer\SerializedName("Events")
     * @Serializer\XmlList(entry="Event")
     */
    protected $events;

    public function getResult()
    {
        if ($this->getErrorCode()) {
            return null;
        }

        return $this->events;
    }
}
