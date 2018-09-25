<?php

/*
 * Copyright 2018 SCTR Services
 *
 * Distribution and reproduction are prohibited.
 *
 * @package     greenrope-api-client
 * @copyright   SCTR Services LLC 2018
 * @license     No License (Proprietary)
 */

namespace Sctr\Greenrope\Api\Request\Broadcast;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("GetBroadcastStatsRequest")
 */
class GetBroadcastStatsRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'account_id',
        'broadcast_id',
        'order_by',
        'limit',
        'message_type'
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
