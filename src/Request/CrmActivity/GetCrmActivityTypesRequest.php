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
 * @Serializer\XmlRoot("GetCRMActivityTypesRequest")
 */
class GetCrmActivityTypesRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'get_all',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
