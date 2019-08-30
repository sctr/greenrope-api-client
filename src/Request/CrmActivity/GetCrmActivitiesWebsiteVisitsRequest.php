<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetCRMActivitiesWebsiteVisitsRequest")
 */
class GetCrmActivitiesWebsiteVisitsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'contact_id',
        'start_date',
        'end_date',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
