<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\Contact;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetContactGroupsRequest")
 */
class GetContactGroupsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'contact_id',
        'firstname',
        'lastname',
        'email',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
