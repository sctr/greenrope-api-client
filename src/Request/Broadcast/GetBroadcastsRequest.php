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
 * @Serializer\XmlRoot("GetBroadcastsRequest")
 */
class GetBroadcastsRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'account_id',
        'Group_id',
        'Contact_id',
        'Datetime_sent',
        'updated_timestamp',
        'message_type',
        'get_all'
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
