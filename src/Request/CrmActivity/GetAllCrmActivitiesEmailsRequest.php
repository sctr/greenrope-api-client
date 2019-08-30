<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetAllCRMActivitiesEmailsRequest")
 */
class GetAllCrmActivitiesEmailsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'contact_id',
        'group_id',
        'group_name',
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

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Contacts")
     * @Serializer\XmlList(entry="Contact_id")
     */
    protected $contacts;
}
