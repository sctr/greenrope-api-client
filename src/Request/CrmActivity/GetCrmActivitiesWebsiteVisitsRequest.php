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
