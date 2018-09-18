<?php

namespace Sctr\Greenrope\Api\Request\Event;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("AddEventsRequest")
 */
class AddEventsRequest
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Event>")
     * @Serializer\SerializedName("Events")
     * @Serializer\XmlList(entry="Event")
     */
    protected $events;

    public function __construct(array $events)
    {
        $this->events = $events;
    }
}
