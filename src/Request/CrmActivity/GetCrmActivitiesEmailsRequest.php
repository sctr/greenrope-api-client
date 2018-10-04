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
 * @Serializer\XmlRoot("GetCRMActivitiesEmailsRequest")
 */
class GetCrmActivitiesEmailsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'contact_id',
        'start_date',
        'end_date',
        'read_start_date',
        'read_end_date',
        'click_start_date',
        'click_end_date',
        'chunk_size',
        'page',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
