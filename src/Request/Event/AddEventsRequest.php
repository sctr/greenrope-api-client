<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\Event;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("AddEventsRequest")
 */
class AddEventsRequest extends GreenropeRequest
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Event>")
     * @Serializer\SerializedName("Events")
     * @Serializer\XmlList(entry="Event")
     */
    protected $events;
}
