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
 * @Serializer\XmlRoot("GetCRMActivitiesRequest")
 */
class GetCrmActivitiesRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'activity_id',
        'contact_id',
        'doneby_contact_id',
        'group_id',
        'group_name',
        'due_date_start',
        'due_date_end',
        'done_date_start',
        'done_date_end',
        'activity',
        'page',
        'chunk_size',
        'updated_timestamp',
        'get_all',
        'start_chunk_id',
        'start_chunk_acctno',
        'show_assignables',
        'get_last_x_activities',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
