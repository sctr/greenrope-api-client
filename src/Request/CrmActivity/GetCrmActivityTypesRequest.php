<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetCRMActivityTypesRequest")
 */
class GetCrmActivityTypesRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'get_all',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
