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
