<?php

namespace Sctr\Greenrope\Api\Request\Contact;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetCompanyContactsRequest")
 */
class GetCompanyContactsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'company_id',
        'group_id',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
