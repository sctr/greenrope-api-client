<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\Contact;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetContactsRequest")
 */
class GetContactsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'contact_id',
        'group_id',
        'firstname',
        'lastname',
        'email',
        'get_all',
        'start_chunk_page',
        'start_chunk_size',
        'Unsubscribed',
        'Unsubscribed_startdate',
        'Unsubscribed_enddate',
        'Bounced',
        'Bounced_startdate',
        'Bounced_enddate',
        'updated_timestamp',
        'start_lastname',
        'end_lastname',
        'do_lead_scoring',
        'search',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
