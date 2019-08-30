<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\Broadcast;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetBroadcastsRequest")
 */
class GetBroadcastsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'Group_id',
        'Contact_id',
        'Datetime_sent',
        'updated_timestamp',
        'message_type',
        'get_all',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
