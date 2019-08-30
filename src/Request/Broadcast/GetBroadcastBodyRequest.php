<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\Broadcast;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("GetBroadcastBodyRequest")
 */
class GetBroadcastBodyRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'broadcast_id',
        'group_id',
        'include_rfc822',
        'contact_id',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;

    public function __construct(array $query = [])
    {
        $this->query = $query;
    }
}
