<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\Event;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("DeleteEventsResponse")
 */
class DeleteEventsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Event>")
     * @Serializer\SerializedName("Events")
     * @Serializer\XmlList(entry="Event")
     */
    protected $events;

    public function getResult()
    {
        return $this->events;
    }
}
