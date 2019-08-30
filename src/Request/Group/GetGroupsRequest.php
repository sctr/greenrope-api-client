<?php

/*
 * @package greenrope-api-client
 * @license MIT License
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
        'group_id',
        'group_name',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
