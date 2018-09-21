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
    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;

    public function __construct(array $query = [])
    {
        $this->query = $query;
    }
}
