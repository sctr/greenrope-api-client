<?php

namespace Sctr\Greenrope\Api\Request\Company;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetCompaniesRequest")
 */
class GetCompaniesRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'company_id',
        'group_id',
        'account_id',
        'scope',
        'has_contacts',
        'search',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
