<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\Broadcast;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetBroadcastStatsRequest")
 */
class GetBroadcastStatsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'broadcast_id',
        'order_by',
        'limit',
        'message_type',
    ];
    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
