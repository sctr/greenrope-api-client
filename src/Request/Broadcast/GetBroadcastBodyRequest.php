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
 * @Serializer\XmlRoot("GetBroadcastBodyRequest")
 */
class GetBroadcastBodyRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'account_id',
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
