<?php

namespace Sctr\Greenrope\Api\Request\Broadcast;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("GetBroadcastsRequest")
 */
class GetBroadcastsRequest
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
