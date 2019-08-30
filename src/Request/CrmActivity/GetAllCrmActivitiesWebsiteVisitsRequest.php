<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetAllCRMActivitiesWebsiteVisitsRequest")
 */
class GetAllCrmActivitiesWebsiteVisitsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'Contact_id',
        'group_id',
        'group_name',
        'start_date',
        'end_date',
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
