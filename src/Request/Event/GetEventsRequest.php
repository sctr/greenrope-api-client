<?php

namespace Sctr\Greenrope\Api\Request\Event;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("GetEventsRequest")
 */
class GetEventsRequest
{
    /**
     * @Serializer\XmlAttributeMap()
     */
    private $query;

    public function __construct(array $query = [])
    {
        $this->query = $query;
    }
}
