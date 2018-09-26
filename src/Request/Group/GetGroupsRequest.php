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

namespace Sctr\Greenrope\Api\Request\Group;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetGroupsRequest")
 */
class GetGroupsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'account_id',
        'group_id',
        'group_name',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
