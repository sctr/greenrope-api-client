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
        'scope',
        'has_contacts',
        'search',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
